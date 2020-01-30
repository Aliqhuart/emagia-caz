<?php

namespace Emagia\Entities\Skills;

use Emagia\Helper\SkillTypeEnum;

/**
 * Class RapidStrikeSkill
 *
 * @package Emagia\Entities\Skills
 * @author  Corin Zotica <alexandru.corin.zotica@gmail.com>
 */
class RapidStrikeSkill extends AbstractSkill
{
    /**
     * RapidStrikeSkill constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'Rapid Strike',
            SkillTypeEnum::ATTACK_ROLL,
            2.0,
            10
        );
    }
}