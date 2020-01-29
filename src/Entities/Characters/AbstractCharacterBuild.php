<?php

namespace Emagia\Entities\Characters;

use Emagia\Entities\Skills\AbstractSkill;

/**
 * Class AbstractCharacterBuild
 *
 * @package Emagia\Entities\Characters
 * @author  Corin Zotica <corin.zotica@dcsplus.net>
 */
abstract class AbstractCharacterBuild
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $health;

    /**
     * @var int
     */
    protected $strength;

    /**
     * @var int
     */
    protected $defence;

    /**
     * @var int
     */
    protected $speed;

    /**
     * @var int
     */
    protected $luck;

    /**
     * @var AbstractSkill[]
     */
    protected $skillList;
}