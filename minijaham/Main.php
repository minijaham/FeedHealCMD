<?php

namespace minijaham;

use pocketmine\plugin\PluginBase;

use minijaham\Commands\FeedCommand;
use minijaham\Commands\HealCommand;

class Main extends PluginBase
{

    public static $instance;

    public static function getInstance()
    {

        return self::$instance;

    }

    public function onEnable()
    {

        $this->getServer()->getLogger()->info("FeedHealCMD Enabled");

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

        $this->getServer()->getLogger()->info("FeedHealCMD Disabled");

    }


}
