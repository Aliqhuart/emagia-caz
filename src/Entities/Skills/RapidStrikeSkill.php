<?php

namespace Emagia\Entities\Skills;

/**
 * Class RapidStrikeSkill
 *
 * @package Emagia\Entities\Skills
 * @author  Corin Zotica <corin.zotica@dcsplus.net>
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
            'attack',
            2.0,
            10
        );
    }
}