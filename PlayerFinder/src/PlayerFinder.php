<?php

declare(strict_types=1);

namespace Endermanbugzjfc\PlayerFinder;

use pocketmine\player\Player;

final class PlayerFinder
{

    /**
     * @template T
     * @param ActionInterface<T> $action
     */
    public function registerAction(
        ActionInterface $action
    ) : void {
    }

    /**
     * @return ActionInterface<mixed>[]
     */
    public function getActions() : array
    {
    }

    /**
     * @param Player $player Has higher priority than action parameter.
     * @param ActionInterface<mixed> $action
     */
    public function openPlayerFinder(
    	Player $player,
    	?Parameter $parameter,
    	ActionInterface $action
    ) : void {
    }
}