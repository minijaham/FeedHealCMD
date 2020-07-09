<?php

namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class FeedCommand extends Command
{
    private $plugin;
    private $config;
    
    public function __construct()
    {
        $this->plugin = Main::getInstance();
        parent::__construct("feed");
        $this->setDescription("Feed yourself!");
        $this->setPermission("command.use.feed");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player)
        {
            if ($sender->hasPermission("command.use.feed"))
            {
                if (empty($args[0])) {
                    $sender->setFood(20);
                    $sender->setSaturation(20);
                    $sender->sendMessage($this->config["feedsuccess"]);
                    return false;
                }
                if (Main::getInstance()->getServer()->getPlayer($args[0]))
                {
                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);
                    $player->setFood(20);
                    $player->setSaturation(20);
                    $sender->sendMessage($this->config["feedsuccess"]);
                }
            } else {
                $sender->sendMessage($this->config["nopermission"]);
            }
        } else {
            $sender->sendMessage("The command must be executed in-game.");
        }
    }
}
