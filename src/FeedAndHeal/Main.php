<?php

namespace FeedAndHeal;

use pocketmine\plugin\PluginBase;

use FeedAndHeal\Commands\FeedCommand;
use FeedAndHeal\Commands\HealCommand;

class Main extends PluginBase
{


    const prefix = "§d[§bAPE§d]§f FeedAndHeal";

    public static $instance;

    public static function getInstance()
    {

        return self::$instance;

    }

    public function onEnable()
    {

        $this->getServer()->getLogger()->info(self::prefix . "Plugin Enabled");

        self::$instance = $this;

        $this->onCommands();

    }

    private function onCommands()
    {

        $this->getServer()->getCommandMap()->registerAll("command",
            [

                new FeedCommand(),
                new HealCommand(),

            ]

        );

    }

    public function onDisable()
    {

        $this->getServer()->getLogger()->info(self::prefix . "Plugin Disabled");

    }


}
