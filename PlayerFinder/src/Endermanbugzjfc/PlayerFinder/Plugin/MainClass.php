<?php

declare(strict_types=1);

namespace Endermanbugzjfc\PlayerFinder\Plugin;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use poggit\libasynql\DataConnector;
use poggit\libasynql\libasynql;

final class MainClass extends PluginBase
{
    private DataConnector $dataConnector;

    protected function onEnable() : void
    {
        $this->loadDatabase();
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
        $log->info("Completed.");
    }

    protected function onDisable() : void
    {
        $connector = $this->dataConnector ?? null;
        if ($connector !== null) {
            $connector->close();
            unset($this->dataConnector);
        }
    }
}
