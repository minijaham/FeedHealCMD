<?php

namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use FeedHealCMD\Task\Particle;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;


class FeedCommand extends Command
{
    private $config;
    private $particle;

    public function __construct()
    {
        parent::__construct("feed");
        $this->setDescription("Feed yourself!");
        $this->setPermission("command.use.feed");
        $this->config = Main::$config;
        $this->particle = Main::$config["particle"]["feed"];
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("command.use.feed")) {
                $sound = "pocketmine\level\sound\\" . $this->config["feedsound"];
                $target = ($args[0] ?? null) ? Main::getInstance()->getServer()->getPlayer($args[0]) : $sender;
                if ($target) {
                    $target->setFood(20);
                    $target->setSaturation(20);
                    $target->getLevel()->addSound(new $sound($target));
                    new Particle($target, $this->particle["range"], $this->particle["type"]);
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
