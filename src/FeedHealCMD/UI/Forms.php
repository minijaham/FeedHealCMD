<?php

declare(strict_types=1);

namespace FeedHealCMD\UI;

use FeedHealCMD\Main;
use FeedHealCMD\Utils\Effects;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\Player;



class Forms
{
    private $Form;
    private $target;
    private $effect;
    public function __construct(Player $target, Player $player)
    {
        $this->Form = Main::$Form;
        $this->target = $target;
        $this->showInfo($player);
    }
    /**
     * Form showing player effects
     * @param Player $player Click the player's op
     * @return void
     **/
    public function showInfo(Player $player): void
    {
        $form = $this->Form->CreateSimpleForm($this->target->getName(), function (Player $player, $data) {
            if (!is_null($data)) {
                $this->showAllEffects($player);
            }
        });
        $form->setContent("Player Owned effects:");
        $form->setButton("Add Effects", "textures/ui/color_plus.png", "path");
        foreach ($this->target->getEffects() as $effect) {
            $effect_id = $effect->getId();
            $form->setButton(Effects::getName($effect_id), Effects::getPath($effect_id), "path");
        }
        $form->sendForm($player);
    }
    /**
     * Form showing all effects
     * @param Player $player Click the player's op
     * @return void
     **/
    public function showAllEffects(Player $player): void
    {
        $form = $this->Form->CreateSimpleForm("Add Effects", function (Player $player, $data) {
            if (is_null($data)) {
                $this->showInfo($player);
            } else {
                $effect_id = array_keys(Effects::getMap())[$data];
                $this->effect = [$effect_id => Effects::getMap()[$effect_id]];
                $this->setEffect($player);
            }
        });
        $form->setContent("Select the effect you want to add to the player:");
        foreach (Effects::getMap() as $id => $effect) {
            $form->setButton($effect["name"], $effect["path"], "path");
        }
        $form->sendForm($player);
    }
    /**
     * Form setting player effects
     * @param Player $player Click the player's op
     * @return void
     **/
    public function setEffect(Player $player): void
    {
        $form = $this->Form->CreateCustomForm(array_values($this->effect)[0]["name"], function (Player $player, $data) {
            if (is_null($data)) {
                $this->showInfo($player);
            } else {
                $this->target->addEffect(new EffectInstance(
                    Effect::getEffect(array_keys($this->effect)[0]),
                    (int)$data[0],
                    (int)$data[1],
                    $data[2]
                )) ? $player->sendMessage("success") : $player->sendMessage("error");
            }
        });
        $form->setInput("Duration(s):", "1000");
        $form->setInput("amplifier:", "1");
        $form->setToggle("Visible:");
        $form->sendForm($player);
    }
}
