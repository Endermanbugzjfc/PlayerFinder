<?php

declare(strict_types=1);

namespace Endermanbugzjfc\PlayerFinder;

use pocketmine\player\Player;

/**
 * T is the target type.
 * @template T
 */
interface ActionInterface
{
    public function getActionParameter(
    	Player $player
    ) : Parameter;

    /**
     * @param T[] $targets
     */
    public function runWithSelectedTargets(
        Player $player,
        array $targets
    ) : void;
}