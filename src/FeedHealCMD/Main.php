<?php

namespace FeedHealCMD;

use pocketmine\plugin\PluginBase;

use FeedHealCMD\Commands\FeedCommand;
use FeedHealCMD\Commands\HealCommand;
use FeedHealCMD\Commands\SpeedCommand;
use FeedHealCMD\Commands\HasteCommand;

class Main extends PluginBase
{

    const prefix = "FeedHeal CMD";

    public static $instance;

    public static function getInstance()
    {

        return self::$instance;

    }

    public function onEnable()
    {

        $this->getServer()->getLogger()->info(self::prefix . " Enabled");

        self::$instance = $this;

        $this->onCommands();

    }

    private function onCommands()
    {

        $this->getServer()->getCommandMap()->registerAll("command",
            [

                new FeedCommand(),
                new HealCommand(),
                new SpeedCommand(),
                new HasteCommand(),

            ]

        );

    }

    public function onDisable()
    {

        $this->getServer()->getLogger()->info(self::prefix . " Disabled");

    }


}
