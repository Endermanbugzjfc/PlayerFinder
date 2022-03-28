<?php

declare(strict_types=1);

namespace Endermanbugzjfc\PlayerFinder\Plugin;

use Endermanbugzjfc\ConfigStruct\Emit;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;
use function file_exists;
use function file_put_contents;

final class MainClass extends PluginBase
{
    private DataConnector $dataConnector;

    private PluginConfig $configObject;

    protected function onEnable() : void
    {
        $this->loadConfig();
        $this->loadDatabase();
    }

    private function loadConfig() : void
    {
        $path = $this->getDataFolder() . "config.yml";
        $object = new PluginConfig();
        if (file_exists($path)) {
            $data = (new Config($path))->getAll();
            $context = Parse::object($object, $data);
            $context->copyToObject($object, $path);
        } else {
            $data = Emit::object($object);
            file_put_contents($path, $data);
        }
        $this->configObject = $object;
    }

    private function loadDatabase() : void
    {
        $log = $this->getLogger();
        $databaseConfigFile = "database.yml";
        $databaseConfigPath = $this->getDataFolder() . $databaseConfigFile;
        $statementMaps = [
            "mysql" => "sql/mysql.sql",
            "sqlite" => "sql/sqlite.sql"
        ];

        $log->info("Establishing connection to database (to track offline player names and store player settings)...");
        $this->saveResource($databaseConfigFile);
        $databaseConfig = (new Config($databaseConfigPath))->getAll();
        $this->dataConnector = libasynql::create($this, $databaseConfig, $statementMaps);
        foreach ([
            "table.player" => [
            ]
        ] as $query => $params) {
            $this->dataConnector->executeGeneric($query, $params);
        }
        $this->dataConnector->waitAll();
        $log->info("Completed.");
    }

    protected function onDisable() : void
    {
        $connector = $this->dataConnector ?? null;
        if ($connector !== null) {
            $connector->close();
            unset($this->dataConnector);
        }
        unset($this->configObject);
    }
}
