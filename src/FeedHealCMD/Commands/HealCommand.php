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

    const prefix = "§7(§a!§7)§a ";

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

                    $sender->setHealth(20);
                    $sender->setSaturation(20);
                    $sender->getLevel()->addParticle(new HappyVillagerParticle($sender));
                    $sender->getLevel()->addSound(new AnvilUseSound($sender));
                    $sender->sendMessage("§aHealed!");

                    return false;

                }

                if (Main::getInstance()->getServer()->getPlayer($args[0]))
                {

                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);

                    $player->setHealth(20);
                    $player->setSaturation(20);
                    $player->getLevel()->addParticle(new HappyVillagerParticle($sender));
                    $player->getLevel()->addSound(new AnvilUseSound($sender));
                    $player->sendMessage("§aHealed!");

                }

            } else {

                $sender->sendMessage("§cYou do not have permission to use this command.");

            }

        } else {

            $sender->sendMessage(self::prefix . "The command must be executed in-game.");

        }

    }

}

