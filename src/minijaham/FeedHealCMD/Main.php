<?php

namespace minijaham\FeedHealCMD;

use pocketmine\plugin\PluginBase;

use Commands\FeedCommand;
use Commands\HealCommand;

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
