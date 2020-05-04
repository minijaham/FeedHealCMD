<?php

namespace minijaham\FeedHealCMD;

use pocketmine\plugin\PluginBase;

use Commands\FeedCommand;
use Commands\HealCommand;

class Main extends PluginBase
{
    public static $instance;
    public static function getInstance()
    {

        return self::$instance;

    }

    public function onEnable()
    {
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


}

