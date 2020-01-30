<?php

namespace Emagia\Entities\Characters;

use Emagia\Errors\CharacterCreationException;
use Throwable;

/**
 * Class WildBeast
 *
 * @package Emagia\Entities\Characters
 * @author  Corin Zotica <alexandru.corin.zotica@gmail.com>
 */
class WildBeast extends AbstractCharacterBuild
{
    /**
     * WildBeast constructor.
     *
     * @param $health
     * @param $strength
     * @param $defence
     * @param $speed
     * @param $luck
     *
     * @throws CharacterCreationException
     */
    public function __construct($health, $strength, $defence, $speed, $luck)
    {
        try {
            parent::__construct($health, $strength, $defence, $speed, $luck);

            $this->setName('Wild Beast');
        } catch (Throwable $e) {
            throw new CharacterCreationException('Oops! A problem occurred when creating the character ' . get_class($this));
        }
    }
}