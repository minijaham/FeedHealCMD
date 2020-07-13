<?php

namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\level\sound\{
    AnvilBreakSound,
    AnvilFallSound,
    AnvilUseSound,
    BlazeShootSound,
    ClickSOund,
    DoorBumpSound,
    DoorCrashSound,
    DoorSound,
    EndermanTeleportSound,
    FizSound,
    GenericSound,
    GhastShootSound,
    GhastSound,
    LaunchSound,
    PopSound
};

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
        $this->config = Main::$config;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("command.use.feed")) {
                if (empty($args[0])) {
                    $sender->setFood(20);
                    $sender->setSaturation(20);
                    $sender->sendMessage($this->config["feedsuccess"]);
                    $sender->getLevel()->addSound(new $this->config["feedsound"]($sender));
                    return false;
                }
                if (Main::getInstance()->getServer()->getPlayer($args[0])) {
                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);
                    $player->setFood(20);
                    $player->setSaturation(20);
                    $sender->sendMessage($this->config["feedsuccess"]);
                    $sender->getLevel()->addSound(new $this->config["feedsound"]($sender));
                }
            } else {
                $sender->sendMessage($this->config["nopermission"]);
            }
        } else {
            $sender->sendMessage("The command must be executed in-game.");
        }
    }
}
