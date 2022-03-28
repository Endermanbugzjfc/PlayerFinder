<?php

declare(strict_types=1);

namespace Endermanbugzjfc\PlayerFinder\Plugin;

use pocketmine\event\plugin\PluginEvent;

abstract class EventBase extends PluginEvent
{
    public function __construct()
    {
        $plugin = MainClass::getInstanceForEvent($this);
        parent::__construct($plugin);
    }
}