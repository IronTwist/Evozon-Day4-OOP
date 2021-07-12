<?php

//  LORD OF THE RINGS WAR RUN PLAY

declare(strict_types=1);

require_once 'FileManager/FileLoadAndWrite.php';
require_once 'Army/EvilArmy.php';
require_once 'Army/GoodArmy.php';
require_once 'Battle/PrepareTheArmies.php';
require_once 'Battle/BattleManager.php';

$goodArmy = new GoodArmy();
$evilArmy = new EvilArmy();
$loadFromFile = new FileLoadAndWrite();

$prepareTheArmies = new PrepareTheArmies($goodArmy, $evilArmy, $loadFromFile);
$prepareTheArmies->createArmiesFromFile('moria.txt');

$battleManager = new BattleManager($prepareTheArmies);
$battleManager->startBattle();

echo $battleManager->getWonArmyDisplay().$battleManager->getLosingArmyDisplay()." won.".PHP_EOL;
echo 'Lost in battle: ';

$lostInBattleWarriors = $battleManager->getWarriorsLostInBattle();

foreach ($lostInBattleWarriors as $lost){
    echo $lost->getName(). ', ';
}

$loadFromFile->writeWarriorsBackToFile($evilArmy, $goodArmy,'warriorsAfterBattle.txt');





