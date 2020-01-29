<?php

namespace Emagia\Entities\Characters;

use Emagia\Errors\CharacterCreationException;
use Throwable;

/**
 * Class Orderus
 *
 * @package Emagia\Entities\Characters
 * @author  Corin Zotica <corin.zotica@dcsplus.net>
 */
class Orderus extends AbstractCharacterBuild
{
    /**
     * Orderus constructor.
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

            $this->setName('Orderus');
        } catch (Throwable $e) {
            throw new CharacterCreationException('Oops! A problem occurred when creating the character ' . get_class($this));
        }
    }
}