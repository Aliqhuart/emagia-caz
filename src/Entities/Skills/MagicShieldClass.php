<?php

namespace Emagia\Entities\Skills;

/**
 * Class MagicShieldClass
 *
 * @package Emagia\Entities\Skills
 * @author  Corin Zotica <corin.zotica@dcsplus.net>
 */
class MagicShieldClass extends AbstractSkill
{
    public function __construct()
    {
        parent::__construct(
            'Magic Shield',
            'damageTaken',
            50,
            20);
    }
}