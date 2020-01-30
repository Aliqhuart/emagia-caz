<?php

namespace Emagia\Helper;

use Emagia\Entities\Characters\AbstractCharacterBuild;

/**
 * Class DisplayHelper
 *
 * @package Emagia\Helper
 * @author  Corin Zotica <alexandru.corin.zotica@gmail.com>
 */
class DisplayHelper
{
    public function displayBattleParticipants(AbstractCharacterBuild $firstPlayer, AbstractCharacterBuild $secondPlayer)
    {
        $this->displayCharacter($firstPlayer);
        $this->displayCharacter($secondPlayer);
    }

    /**
     * @param AbstractCharacterBuild $characterBuild
     */
    public function displayCharacter(AbstractCharacterBuild $characterBuild)
    {
        $this->logMessage('<b>Character: </b>' . $characterBuild->getName());

        $this->logMessage(
            '<b>HP: </b>' . $characterBuild->getHealth() . ', ' .
            '<b>STR: </b>' . $characterBuild->getStrength() . ', ' .
            '<b>DEF: </b>' . $characterBuild->getDefence() . ', ' .
            '<b>SPD: </b>' . $characterBuild->getSpeed() . ', ' .
            '<b>LCK: </b>' . $characterBuild->getLuck() . '%'
        );

        $playerAbilities = $characterBuild->getSkillList();
        if ($playerAbilities) {
            $this->logMessage('<b>Abilities: </b>' . implode(', ', $playerAbilities));
        } else {
            $this->logMessage('No abilities!');
        }
        echo '<br>';
    }

    /**
     * @param string $message
     */
    public function logMessage(string $message)
    {
        echo '<br>';
        print_r($message);
    }
}