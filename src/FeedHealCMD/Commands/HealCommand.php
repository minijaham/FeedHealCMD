<?php


namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\level\sound\AnvilUseSound;

class HealCommand extends Command
{

    private $plugin;

    public function __construct()
    {
        $this->plugin = Main::getInstance();

        parent::__construct("heal");

        $this->setDescription("Heal yourself!");
        $this->setPermission("feedhealcmd.heal");

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
                    $sender->getLevel()->addParticle(new HappyVillagerParticle($sender));
                    $sender->getLevel()->addSound(new AnvilUseSound($sender));
                    $sender->sendMessage("§aHealed!");

                    return false;

                }

                if (Main::getInstance()->getServer()->getPlayer($args[0]))
                {

                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);

                    $player->setHealth($player->getMaxHealth());
                    $player->getLevel()->addParticle(new HappyVillagerParticle($player));
                    $player->getLevel()->addSound(new AnvilUseSound($player));
                    $player->sendMessage("§aHealed!");

                }

            } else {

                $sender->sendMessage("§cYou do not have permission to use this command.");

            }

        } else {

            $sender->sendMessage("The command must be executed in-game.");

        }

    }

}

