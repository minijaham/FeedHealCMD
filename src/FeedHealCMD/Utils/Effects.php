<?php

declare(strict_types=1);

namespace FeedHealCMD\Utils;

class Effects
{
    private static $EffectsMap = [
        "1" => ["name" => "moveSpeed", "path" => "textures/ui/speed_effect.png"],
        "2" => ["name" => "moveSlowdown", "path" => "textures/ui/slowness_effect.png"],
        "3" => ["name" => "digSpeed", "path" => "textures/ui/haste_effect.png"],
        "4" => ["name" => "digSlowDown", "path" => "textures/ui/mining_fatigue_effect.png"],
        "5" => ["name" => "damageBoost", "path" => "textures/ui/strength_effect.png"],
        "8" => ["name" => "jump", "path" => "textures/ui/jump_boost_effect.png"],
        "9" => ["name" => "confusion", "path" => "textures/ui/nausea_effect.png"],
        "10" => ["name" => "regeneration", "path" => "textures/ui/regeneration_effect.png"],
        "11" => ["name" => "resistance", "path" => "textures/ui/resistance_effect.png"],
        "12" => ["name" => "fireResistance", "path" => "textures/ui/fire_resistance_effect.png"],
        "13" => ["name" => "waterBreathing", "path" => "textures/ui/water_breathing_effect.png"],
        "14" => ["name" => "invisibility", "path" => "textures/ui/invisibility_effect.png"],
        "15" => ["name" => "blindness", "path" => "textures/ui/blindness_effect.png"],
        "16" => ["name" => "nightVision", "path" => "textures/ui/night_vision_effect.png"],
        "17" => ["name" => "hunger", "path" => "textures/ui/hunger_effect.png"],
        "18" => ["name" => "weakness", "path" => "textures/ui/weakness_effect.png"],
        "19" => ["name" => "poison", "path" => "textures/ui/poison_effect.png"],
        "20" => ["name" => "wither", "path" => "textures/ui/wither_effect.png"],
        "21" => ["name" => "healthBoost", "path" => "textures/ui/health_boost_effect.png"],
        "22" => ["name" => "absorption", "path" => "textures/ui/absorption_effect.png"],
        "24" => ["name" => "levitation", "path" => "textures/ui/levitation_effect.png"],
        "26" => ["name" => "conduitPower", "path" => "textures/ui/conduit_power_effect.png"],

    ];
    public static function getPath(int $id): ?string
    {
        return self::$EffectsMap[$id]["path"];
    }
    public static function getName(int $id): ?string
    {
        return self::$EffectsMap[$id]["name"];
    }
    public static function getMap(): array
    {
        return self::$EffectsMap;
    }
}
