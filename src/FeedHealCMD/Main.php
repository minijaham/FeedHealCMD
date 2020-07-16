<?php

namespace FeedHealCMD;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use FeedHealCMD\Commands\FeedCommand;
use FeedHealCMD\Commands\HealCommand;
use FeedHealCMD\Event\Events;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase
{

    const prefix = "FeedHeal CMD";

    public static $instance;

    public static $config;

    public static $Form;

    public static function getInstance()
    {

        return self::$instance;
    }

    public function onEnable()
    {

        $this->saveResource("config.yml");

        self::$config = (new Config($this->getDataFolder() . "config.yml", Config::YAML))->getAll();

        self::$instance = $this;

        $this->getServer()->getPluginManager()->registerEvents(new Events, $this);

        $this->onCommands();

        if ($GForm = $this->getServer()->getPluginManager()->getPlugin("GForm")) {
            self::$Form = $GForm;
            $this->getServer()->getLogger()->info(self::prefix . " Enabled");
        } else {
            $this->getLogger()->info(TF::RED . "GForm API required! Visit:https://github.com/zRains/GForm");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    }

    private function onCommands()
    {

        $this->getServer()->getCommandMap()->registerAll(
            "command",
            [

                new FeedCommand(),
                new HealCommand(),

            ]

        );
    }

    public function onDisable()
    {

        $this->getServer()->getLogger()->info(self::prefix . " Disabled");
    }
}
