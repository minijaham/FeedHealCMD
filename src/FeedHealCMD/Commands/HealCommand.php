<?php

namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class HealCommand extends Command
{
    private $plugin;
    private $config;
    
    public function __construct()
    {
        $this->plugin = Main::getInstance();
        parent::__construct("heal");
        $this->setDescription("Heal yourself!");
        $this->setPermission("command.use.heal");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player)
        {
            if ($sender->hasPermission("command.use.heal"))
            {
                if (empty($args[0]))
                {
                    $sender->setHealth($sender->getMaxHealth());
                    $sender->sendMessage($this->config["healsuccess"]);
                    return false;
                }
                if (Main::getInstance()->getServer()->getPlayer($args[0]))
                {
                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);
                    $sender->setHealth($sender->getMaxHealth());
                    $sender->sendMessage($this->config["healsuccess"]);
                }
            } else {
                $sender->sendMessage($this->config["nopermission"]);
            }
        } else {
            $sender->sendMessage(self::prefix . "The command must be executed in-game.");
        }
    }
}
