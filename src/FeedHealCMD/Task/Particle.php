<?php

declare(strict_types=1);

namespace FeedHealCMD\Task;

use FeedHealCMD\Main;
use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\level\particle\DustParticle;

class Particle extends Task
{
    private $Particle;
    private $Range;
    private $Player;
    public function __construct(Player $player, int $range, string $particle)
    {
        Main::getInstance()->getScheduler()->scheduleTask($this);
        $this->Particle = $particle;
        $this->Range = $range;
        $this->Player = $player;
    }
    public function onRun(int $currentTick)
    {
        $player = $this->Player;
        switch ($this->Particle) {
            case 'circle':
                for ($i = 1; $i <= 360; $i++) {
                    $a = cos($i * M_PI / 180) * $this->Range;
                    $b = sin($i * M_PI / 180) * $this->Range;
                    $player->getLevel()->addParticle(new DustParticle($player->getPosition()->add($a, 1.5, $b), 98, 220, 150, 1));
                    $player->getLevel()->addParticle(new DustParticle($player->getPosition()->add($a, 1, $b), 140, 229, 178, 1));
                    $player->getLevel()->addParticle(new DustParticle($player->getPosition()->add($a, 0.5, $b), 46, 204, 113, 1));
                }
                break;
                // other particles
            case 'none':
            default:
                break;
        }
    }
}
