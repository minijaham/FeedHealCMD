<?php

namespace FeedHealCMD\Commands;

use minijaham\FeedHealCMD\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class FeedCommand extends Command
{

    private $plugin;

    const prefix = "§7(§a!§7)§a ";

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

                    $sender->sendMessage(self::prefix . "Fed!");

                    return false;

                }

                if (Main::getInstance()->getServer()->getPlayer($args[0]))
                {

                    $player = Main::getInstance()->getServer()->getPlayer($args[0]);

                    $player->setFood(20);
                    $player->setSaturation(20);

                    $player->sendMessage(self::prefix . "Fed!");

                }

            } else {

                $sender->sendMessage("§cYou do not have permission to use this command. Buy the command or a rank in andromedamcpe.buycraft.net!");

            }

        } else {

            $sender->sendMessage(self::prefix . "Go in-game and use this nate .-.");

        }

    }

}
