<?php

namespace Emagia\Entities\Characters;

use Emagia\Entities\Skills\AbstractSkill;
use Emagia\Errors\CharacterCreationException;

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

    /**
     * AbstractCharacterBuild constructor.
     *
     * @param int $health
     * @param int $strength
     * @param int $defence
     * @param int $speed
     * @param int $luck
     *
     * @throws CharacterCreationException
     */
    public function __construct(int $health, int $strength, int $defence, int $speed, int $luck)
    {
        try {
            $this->setHealth($health)
                ->setStrength($strength)
                ->setDefence($defence)
                ->setSpeed($speed)
                ->setLuck($luck);
        } catch (\Throwable $e) {
            throw new CharacterCreationException('Oops! A problem occurred when creating the character ' . get_class($this));
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return AbstractCharacterBuild
     */
    public function setName(string $name): AbstractCharacterBuild
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     *
     * @return AbstractCharacterBuild
     */
    public function setHealth(int $health): AbstractCharacterBuild
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     *
     * @return AbstractCharacterBuild
     */
    public function setStrength(int $strength): AbstractCharacterBuild
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     *
     * @return AbstractCharacterBuild
     */
    public function setDefence(int $defence): AbstractCharacterBuild
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     *
     * @return AbstractCharacterBuild
     */
    public function setSpeed(int $speed): AbstractCharacterBuild
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     *
     * @return AbstractCharacterBuild
     */
    public function setLuck(int $luck): AbstractCharacterBuild
    {
        $this->luck = $luck;

        return $this;
    }

    /**
     * @return AbstractSkill[]
     */
    public function getSkillList(): array
    {
        return $this->skillList;
    }

    /**
     * @param AbstractSkill[] $skillList
     *
     * @return AbstractCharacterBuild
     */
    public function setSkillList(array $skillList): AbstractCharacterBuild
    {
        $this->skillList = $skillList;

        return $this;
    }

    /**
     * @param AbstractSkill $skill
     *
     * @return $this
     */
    public function addSkill(AbstractSkill $skill): self
    {
        $this->skillList[] = $skill;

        return $this;
    }
}