<?php

require_once __DIR__ . '/vendor/autoload.php';

use Emagia\Entities\Battle\BattleEntity;
use Emagia\Errors\BattleException;
use Emagia\Errors\CharacterCreationException;
use Emagia\Factory\CharacterFactory;

try {
    $battle = new BattleEntity(
        CharacterFactory::createOrderus(),
        CharacterFactory::createWildBeast()
    );

    $battle->startBattle();
} catch (CharacterCreationException $e) {
    print_r('The character creation has failed! You will be able to hunt for monsters another time!');
} catch (BattleException $e) {
    print_r('The battle has failed! You will be able to hunt for monsters another time!' . $e->getMessage());
} catch (Throwable $e) {
    print_r('Unknown exception! ' . $e->getMessage());
}