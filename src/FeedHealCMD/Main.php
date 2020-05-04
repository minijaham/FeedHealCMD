<?php

namespace FeedHealCMD;

use pocketmine\plugin\PluginBase;

use FeedHealCMD\Commands\FeedCommand;
use FeedHealCMD\Commands\HealCommand;

class Main extends PluginBase
{


    const prefix = "FeedHealCMD";

    public static $instance;

    public static function getInstance()
    {

        return self::$instance;

    }

    public function onEnable()
    {

        $this->getServer()->getLogger()->info(self::prefix . "Enabled");

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

        $this->getServer()->getLogger()->info(self::prefix . "Disabled");

    }


}
