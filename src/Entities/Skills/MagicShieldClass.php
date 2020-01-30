<?php

namespace Emagia\Entities\Skills;

use Emagia\Helper\SkillTypeEnum;

/**
 * Class MagicShieldClass
 *
 * @package Emagia\Entities\Skills
 * @author  Corin Zotica <alexandru.corin.zotica@gmail.com>
 */
class MagicShieldClass extends AbstractSkill
{
    public function __construct()
    {
        parent::__construct(
            'Magic Shield',
            SkillTypeEnum::DEFENCE,
            0.5,
            20);
    }
}