<?php

namespace Emagia\Entities\Battle;

use Emagia\Entities\Characters\AbstractCharacterBuild;
use Emagia\Errors\BattleException;
use Emagia\Helper\DisplayHelper;
use Exception;

/**
 * Class BattleEntity
 *
 * @package Emagia\Entities\Battle
 * @author  Corin Zotica <alexandru.corin.zotica@gmail.com>
 */
class BattleEntity
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
     * BattleEntity constructor.
     *
     * @param AbstractCharacterBuild $firstPlayer
     * @param AbstractCharacterBuild $secondPlayer
     */
    public function __construct(AbstractCharacterBuild $firstPlayer, AbstractCharacterBuild $secondPlayer)
    {
        $this->firstPlayer  = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
        $this->displayHelper = new DisplayHelper();
    }

    /**
     * @return AbstractCharacterBuild
     */
    public function getFirstPlayer(): AbstractCharacterBuild
    {
        return $this->firstPlayer;
    }

    /**
     * @param AbstractCharacterBuild $firstPlayer
     *
     * @return BattleEntity
     */
    public function setFirstPlayer(AbstractCharacterBuild $firstPlayer): BattleEntity
    {
        $this->firstPlayer = $firstPlayer;

        return $this;
    }

    /**
     * @return AbstractCharacterBuild
     */
    public function getSecondPlayer(): AbstractCharacterBuild
    {
        return $this->secondPlayer;
    }

    /**
     * @param AbstractCharacterBuild $secondPlayer
     *
     * @return BattleEntity
     */
    public function setSecondPlayer(AbstractCharacterBuild $secondPlayer): BattleEntity
    {
        $this->secondPlayer = $secondPlayer;

        return $this;
    }

    /**
     * @throws BattleException
     * @throws Exception
     */
    public function startBattle()
    {
        if(!$this->firstPlayer || !$this->secondPlayer) {
            throw new BattleException('You have to initialize the participants of the battle!');
        }

        $this->displayHelper->displayBattleParticipants($this->firstPlayer, $this->secondPlayer);
        $phaseIndex = 0;
        $this->displayHelper->logMessage('<b>Battle begins!!!</b>');

        while($this->canTheBattleContinue()) {
            $this->displayHelper->logMessage('<br>');
            $this->displayHelper->logMessage('<b>Phase ' . ++$phaseIndex . '</b>');

            $phase = new PhaseEntity(
                $this->firstPlayer,
                $this->secondPlayer,
                $this->displayHelper
            );

            $phase->settlePhase();
        }

        $this->getWinner();
    }

    /**
     * @return bool
     */
    public function canTheBattleContinue(): bool
    {
        return !($this->firstPlayer->getHealth() <= 0 || $this->secondPlayer->getHealth() <= 0);
    }

    /**
     * @throws BattleException
     */
    public function getWinner()
    {
        if($this->firstPlayer->getHealth() <= 0) {
            $this->displayHelper->logMessage('<b>The battle is over! ' . $this->secondPlayer->getName() . ' has won!</b>');
        } elseif ($this->secondPlayer->getHealth() <= 0) {
            $this->displayHelper->logMessage('<b>The battle is over! ' . $this->firstPlayer->getName() . ' has won!</b>');
        } else {
            throw new BattleException('We don\'t know what happened... A black hole opened up and swallowed both participants!');
        }
    }
}