<?php

declare(strict_types=1);

namespace Endermanbugzjfc\PlayerFinder\Plugin;

final class PluginConfig
{
    public const PAGE_BUTTONS_POSITION_BOTH = "both";
    public const PAGE_BUTTONS_POSITION_TOP = "both";
    public const PAGE_BUTTONS_POSITION_BOTTOM = "bottom";

    public bool $samePageForSearchBarAndSelector = false;
    public int $resultsPerPage = 20;
    public string $pageButtonsPosition = "both";

    public bool $enableFindPlayerCommand = true;
    public bool $autoHideCommands = true;

    public string $commandName = "findplayer";
    public string $commandDescription = "Find a player on the server.";
    /**
     * @var string[]
     */
    public array $commandAliases = [
        "findplayers",
        "playerfinder",
        "playersfinder"
    ];

    public string $commandNameExcludeOffline = "exclude-offline";
    public string $commandDescriptionExcludeOffline = "Find an online player on the server.";
    /**
     * @var string[]
     */
    public array $commandAliasesExcludeOffline = [
        "no-offline",
        "online-only",
        "only-online"
    ];
}