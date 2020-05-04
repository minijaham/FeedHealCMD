<?php

namespace minijaham\FeedHealCMD;

use pocketmine\plugin\PluginBase;

use FeedHealCMD\Commands\FeedCommand;
use FeedHealCMD\Commands\HealCommand;

class Main extends PluginBase
{
    public static function getInstance()
    {

        return self::$instance;

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
