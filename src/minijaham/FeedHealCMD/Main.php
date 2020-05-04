<?php

namespace minijaham\FeedHealCMD;

use pocketmine\plugin\PluginBase;

use FeedHealCMD\Commands\FeedCommand;
use FeedHealCMD\Commands\HealCommand;

class Main extends PluginBase
{
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
