<?php

namespace Emagia\Factory;

use Emagia\Entities\Characters\Orderus;
use Emagia\Entities\Characters\WildBeast;
use Emagia\Entities\Skills\MagicShieldClass;
use Emagia\Entities\Skills\RapidStrikeSkill;
use Emagia\Errors\CharacterCreationException;
use Emagia\Helper\OrderusLimitations;
use Emagia\Helper\WildBeastLimitations;
use Exception;

class CharacterFactory
{
    /**
     * @return WildBeast
     * @throws CharacterCreationException
     * @throws Exception
     */
    public static function createWildBeast(): WildBeast
    {
        return new WildBeast(
            random_int(WildBeastLimitations::MIN_HEALTH, WildBeastLimitations::MAX_HEALTH),
            random_int(WildBeastLimitations::MIN_STRENGTH, WildBeastLimitations::MAX_STRENGTH),
            random_int(WildBeastLimitations::MIN_DEFENCE, WildBeastLimitations::MAX_DEFENCE),
            random_int(WildBeastLimitations::MIN_SPEED, WildBeastLimitations::MAX_SPEED),
            random_int(WildBeastLimitations::MIN_LUCK, WildBeastLimitations::MAX_LUCK)
        );
    }

    /**
     * @return Orderus
     * @throws CharacterCreationException
     * @throws Exception
     */
    public static function createOrderus(): Orderus
    {
        $orderus = new Orderus(
            random_int(OrderusLimitations::MIN_HEALTH, OrderusLimitations::MAX_HEALTH),
            random_int(OrderusLimitations::MIN_STRENGTH, OrderusLimitations::MAX_STRENGTH),
            random_int(OrderusLimitations::MIN_DEFENCE, OrderusLimitations::MAX_DEFENCE),
            random_int(OrderusLimitations::MIN_SPEED, OrderusLimitations::MAX_SPEED),
            random_int(OrderusLimitations::MIN_LUCK, OrderusLimitations::MAX_LUCK)
        );

        $orderus->addSkill(new RapidStrikeSkill())
                ->addSkill(new MagicShieldClass());
        return $orderus;
    }
}