<?php

namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\level\sound\AnvilUseSound;

class FeedCommand extends Command
{

    private $plugin;
    
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
                    $sender->getLevel()->addParticle(new HappyVillagerParticle($sender));
                    $sender->getLevel()->addSound(new AnvilUseSound($sender));
                    $sender->addTitle("§aFed!");

                    return false;

                }

                if (Main::getInstance()->getServer()->getPlayer($args[0]))
                {

                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);

                    $player->setFood(20);
                    $player->setSaturation(20);
                    $sender->getLevel()->addParticle(new HappyVillagerParticle($sender));
                    $sender->getLevel()->addSound(new AnvilUseSound($sender));
                    $player->sendMessage("§aFed!");

                }

            } else {

                $sender->sendMessage("§cYou do not have permission to use this command.");

            }

        } else {

            $sender->sendMessage(self::prefix . "The command must be executed in-game.");

        }

    }

}
