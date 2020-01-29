<?php

namespace Emagia\Entities\Skills;

/**
 * Class AbstractSkill
 *
 * @package Emagia\Entities\Skills
 * @author  Corin Zotica <corin.zotica@dcsplus.net>
 */
abstract class AbstractSkill
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $affects;

    /**
     * @var string
     */
    protected $modifiedSkill;

    /**
     * @var float
     */
    protected $modifier;

    /**
     * @var int
     */
    protected $chance;

    /**
     * AbstractSkill constructor.
     *
     * @param string $name
     * @param string $affects
     * @param string $modifiedSkill
     * @param float  $modifier
     * @param int    $chance
     */
    public function __construct(string $name, string $affects, string $modifiedSkill, float $modifier, int $chance)
    {
        $this->name          = $name;
        $this->affects       = $affects;
        $this->modifiedSkill = $modifiedSkill;
        $this->modifier      = $modifier;
        $this->chance        = $chance;
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
     * @return AbstractSkill
     */
    public function setName(string $name): AbstractSkill
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAffects(): string
    {
        return $this->affects;
    }

    /**
     * @param string $affects
     *
     * @return AbstractSkill
     */
    public function setAffects(string $affects): AbstractSkill
    {
        $this->affects = $affects;

        return $this;
    }

    /**
     * @return string
     */
    public function getModifiedSkill(): string
    {
        return $this->modifiedSkill;
    }

    /**
     * @param string $modifiedSkill
     *
     * @return AbstractSkill
     */
    public function setModifiedSkill(string $modifiedSkill): AbstractSkill
    {
        $this->modifiedSkill = $modifiedSkill;

        return $this;
    }

    /**
     * @return float
     */
    public function getModifier(): float
    {
        return $this->modifier;
    }

    /**
     * @param float $modifier
     *
     * @return AbstractSkill
     */
    public function setModifier(float $modifier): AbstractSkill
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * @return int
     */
    public function getChance(): int
    {
        return $this->chance;
    }

    /**
     * @param int $chance
     *
     * @return AbstractSkill
     */
    public function setChance(int $chance): AbstractSkill
    {
        $this->chance = $chance;

        return $this;
    }
}