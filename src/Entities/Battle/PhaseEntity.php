<?php

namespace Emagia\Entities\Battle;

use Emagia\Entities\Characters\AbstractCharacterBuild;
use Emagia\Entities\Skills\AbstractSkill;
use Emagia\Errors\BattleException;
use Emagia\Helper\DisplayHelper;
use Emagia\Helper\SkillTypeEnum;
use Exception;

/**
 * Class PhaseEntity
 *
 * @package Emagia\Entities\Battle
 * @author  Corin Zotica <alexandru.corin.zotica@gmail.com>
 */
class PhaseEntity
{
    /**
     * @var AbstractCharacterBuild
     */
    protected $firstPlayer;

    /**
     * @var AbstractCharacterBuild
     */
    protected $secondPlayer;

    /**
     * @var DisplayHelper
     */
    protected $displayHelper;

    /**
     * PhaseEntity constructor.
     *
     * @param AbstractCharacterBuild $firstPlayer
     * @param AbstractCharacterBuild $secondPlayer
     * @param DisplayHelper          $displayHelper
     */
    public function __construct(AbstractCharacterBuild $firstPlayer, AbstractCharacterBuild $secondPlayer, DisplayHelper $displayHelper)
    {
        $this->firstPlayer   = $firstPlayer;
        $this->secondPlayer  = $secondPlayer;
        $this->displayHelper = $displayHelper;
    }

    /**
     * @throws Exception
     */
    public function settlePhase()
    {
        if ($this->firstPlayerAttacks()) {
            $this->attack($this->firstPlayer, $this->secondPlayer);
            $this->attack($this->secondPlayer, $this->firstPlayer);
        } else {
            $this->attack($this->secondPlayer, $this->firstPlayer);
            $this->attack($this->firstPlayer, $this->secondPlayer);
        }
    }

    /**
     * @return bool
     */
    public function firstPlayerAttacks(): bool
    {
        $firstPlayerSpeed  = $this->firstPlayer->getSpeed();
        $secondPlayerSpeed = $this->secondPlayer->getSpeed();

        if ($firstPlayerSpeed === $secondPlayerSpeed) {
            return $this->firstPlayer->getLuck() >= $this->secondPlayer->getLuck();
        }

        return $firstPlayerSpeed > $secondPlayerSpeed;
    }

    /**
     * @param AbstractCharacterBuild $attackingPlayer
     * @param AbstractCharacterBuild $defendingPlayer
     *
     * @throws Exception
     */
    public function attack(AbstractCharacterBuild $attackingPlayer, AbstractCharacterBuild $defendingPlayer)
    {
        $damageDone = $this->computeDamage($attackingPlayer, $defendingPlayer);
        if ($damageDone) {
            $defendingPlayer->setHealth($defendingPlayer->getHealth() - $damageDone);
            $this->displayHelper->logMessage($attackingPlayer->getName() . ' attacks ' . $defendingPlayer->getName() . ' with ' . $damageDone . ' DMG!');
        }

        $this->displayHelper->logMessage($defendingPlayer->getName() . ' has ' . $defendingPlayer->getHealth() . 'HP left!');
        $this->displayHelper->logMessage('<br>');
    }

    /**
     * @param AbstractCharacterBuild $attackingPlayer
     * @param AbstractCharacterBuild $defendingPlayer
     *
     * @return float
     * @throws BattleException
     * @throws Exception
     */
    public function computeDamage(AbstractCharacterBuild $attackingPlayer, AbstractCharacterBuild $defendingPlayer): float
    {
        $totalDamageDone = 0.0;

        $numberOfAttacks         = 1;
        $attackingPlayerStrength = $attackingPlayer->getStrength();

        $attackingSKills = $this->getActivatedAttackSkills($attackingPlayer);
        /** @var AbstractSkill $attackingSKill */
        foreach ($attackingSKills as $attackingSKill) {
            $this->displayHelper->logMessage($attackingPlayer->getName() . ' has activated ' . $attackingSKill->getName());

            switch ($attackingSKill->getModifiedSkill()) {
                case SkillTypeEnum::ATTACK_ROLL:
                    $numberOfAttacks = $attackingSKill->getModifier();
                    break;

                case SkillTypeEnum::STRENGTH:
                    $attackingPlayerStrength *= $attackingSKill->getModifier();
                    break;

                default:
                    throw new BattleException('Unknown attacking sKill: ' . get_class($attackingSKill));
            }
        }

        for ($attackIndex = 1; $attackIndex <= $numberOfAttacks; $attackIndex++) {
            $defenceSKills = $this->getActivatedDefenceSkills($defendingPlayer);

            if ($this->doYouFeelLuckyPunk($defendingPlayer->getLuck())) {
                $damageDone = 0;
                $this->displayHelper->logMessage($defendingPlayer->getName() . ' is extremely lucky and is dealt 0 DMG!');
            } else {
                $damageDone = $attackingPlayerStrength - $defendingPlayer->getDefence();
                /** @var AbstractSkill $defenceSKill */
                foreach ($defenceSKills as $defenceSKill) {
                    $this->displayHelper->logMessage($defendingPlayer->getName() . ' has activated ' . $defenceSKill->getName());

                    switch ($defenceSKill->getModifiedSkill()) {
                        case SkillTypeEnum::DEFENCE:
                            $damageDone *= $defenceSKill->getModifier();
                            break;

                        default:
                            throw new BattleException('Unknown defence skill: ' . get_class($defenceSKill));
                            break;
                    }
                }
            }

            $totalDamageDone += $damageDone;
        }

        return $totalDamageDone;
    }

    /**
     * @param AbstractCharacterBuild $attackingPlayer
     *
     * @return array
     * @throws Exception
     */
    public function getActivatedAttackSkills(AbstractCharacterBuild $attackingPlayer): array
    {
        $attackingSkills = [];

        /** @var AbstractSkill $skill */
        foreach ($attackingPlayer->getSkillList() as $skill) {
            if (($skill->getModifiedSkill() === SkillTypeEnum::ATTACK_ROLL) && $this->rollDice() <= $skill->getChance()) {
                $attackingSkills[] = $skill;
            }
        }

        return $attackingSkills;
    }

    /**
     * @param AbstractCharacterBuild $defencePlayer
     *
     * @return array
     * @throws Exception
     */
    public function getActivatedDefenceSkills(AbstractCharacterBuild $defencePlayer): array
    {
        $attackingSkills = [];

        /** @var AbstractSkill $skill */
        foreach ($defencePlayer->getSkillList() as $skill) {
            if (($skill->getModifiedSkill() === SkillTypeEnum::DEFENCE) && $this->rollDice() <= $skill->getChance()) {
                $attackingSkills[] = $skill;
            }
        }

        return $attackingSkills;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function rollDice(): int
    {
        return random_int(0, 100);
    }

    /**
     * @param int $playerLuck
     *
     * @return bool
     * @throws Exception
     */
    public function doYouFeelLuckyPunk(int $playerLuck): bool
    {
        return $this->rollDice() <= $playerLuck;
    }
}