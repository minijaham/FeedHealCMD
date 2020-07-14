<?php

namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use FeedHealCMD\Task\Particle;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class HealCommand extends Command
{
    private $config;
    private $particle;

    public function __construct()
    {
        parent::__construct("heal");
        $this->setDescription("Heal yourself!");
        $this->setPermission("command.use.heal");
        $this->config = Main::$config;
        $this->particle = Main::$config["particle"]["heal"];
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("command.use.heal")) {
                $sound = "pocketmine\level\sound\\" . $this->config["healsound"];
                $target = ($args[0] ?? null) ? Main::getInstance()->getServer()->getPlayer($args[0]) : $sender;
                if ($target) {
                    $target->setHealth($target->getMaxHealth());
                    $target->getLevel()->addSound(new $sound($target));
                    new Particle($target, $this->particle["range"], $this->particle["type"]);
                    $sender->sendMessage($this->config["healsuccess"]);
                }
            } else {
                $sender->sendMessage($this->config["nopermission"]);
            }
        } else {
            $sender->sendMessage(Main::prefix . "The command must be executed in-game.");
        }
    }
}
