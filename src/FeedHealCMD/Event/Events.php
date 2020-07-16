<?php

declare(strict_types=1);

namespace FeedHealCMD\Event;

use FeedHealCMD\Main;
use FeedHealCMD\UI\Forms;
use pocketmine\Player;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\Listener;




class Events implements Listener
{
    private $config;

    public function __construct()
    {
        $this->config = Main::$config;
    }

    public function onJoin(PlayerJoinEvent $e)
    {
        $player = $e->getPlayer();
        new Forms($player, $player);
        if (Main::$config["auto_feed"]) {
            $player->setFood(20);
            $player->setSaturation(20);
        }
        if (Main::$config["auto_heal"]) {
            $player->setHealth($player->getMaxHealth());
        }
    }
    public function onChangeItemInHeld(PlayerItemHeldEvent $e)
    {
        $player = $e->getPlayer();
        $item = $e->getItem();
        if (Main::$config["touch_mode"]["enable"] && $player->isOp()) {
            switch ($item->getId() . ":" . $item->getDamage()) {
                case $this->config["touch_mode"]["feed"]["item_id"]:
                    $player->sendTip(Main::prefix . " - Click player to feed!");
                    break;
                case $this->config["touch_mode"]["heal"]["item_id"]:
                    $player->sendTip(Main::prefix . " - Click player to heal!");
                    break;
                case $this->config["touch_mode"]["fh"]["item_id"]:
                    $player->sendTip(Main::prefix . " - Click player to feed and heal!");
                    break;
            }
        }
    }
    public function clickPlayer(EntityDamageByEntityEvent $e)
    {
        $player = $e->getEntity() instanceof Player ? $e->getEntity() : null;
        $damager = $e->getDamager() instanceof Player ? $e->getDamager() : null;
        if ($damager && $damager->isOp() && Main::$config["touch_mode"]["enable"]) {
            $id = $damager->getInventory()->getItemInHand()->getId() . ":" . $damager->getInventory()->getItemInHand()->getDamage();
            Main::getInstance()->getLogger()->info($id);
            switch ($id) {
                case $this->config["touch_mode"]["feed"]["item_id"]:
                    $this->command([[$damager, "feed " . $player->getName()]]);
                    $e->setCancelled();
                    break;
                case $this->config["touch_mode"]["heal"]["item_id"]:
                    $this->command([[$damager, "heal " . $player->getName()]]);
                    $e->setCancelled();
                    break;
                case $this->config["touch_mode"]["fh"]["item_id"]:
                    $this->command([[$damager, "feed " . $player->getName()], [$damager, "heal " . $player->getName()]]);
                    $e->setCancelled();
                    break;
                case '341:0':
                    new Forms($player, $damager);
                    $e->setCancelled();
                    break;
            }
        }
    }

    public function command(array $cmds): void
    {
        foreach ($cmds as $cmd) {
            Main::getInstance()->getServer()->dispatchCommand($cmd[0], $cmd[1]);
        }
    }
}
