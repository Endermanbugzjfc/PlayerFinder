<?php

declare(strict_types=1);

namespace Endermanbugzjfc\PlayerFinder;

final class Parameter
{
    public bool $showOfflinePlayers = true;

    public int $minTargets = 0;
    public int $maxTargets = 0;

    public string $searchBarDefaultValue = "";

    /**
     * @var string[]
     */
    public array $targetTypes = [
        "minecraft:player"
    ];
    public bool $targetTypesWhitelist = true;
}