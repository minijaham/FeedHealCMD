<?php


namespace FeedHealCMD\Commands;

use FeedHealCMD\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

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

                    $sender->sendMessage(self::prefix . "Healed!");

                    return false;

                }

                if (Main::getInstance()->getServer()->getPlayer($args[0]))
                {

                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);

                    $player->setHealth(20);
                    $player->setSaturation(20);

                    $player->sendMessage(self::prefix . "Healed!");

                }

            } else {

                $sender->sendMessage("§cYou do not have permission to use this command.");

            }

        } else {

            $sender->sendMessage(self::prefix . "The command must be executed in-game.");

        }

    }

}

