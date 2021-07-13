<?php

//  LORD OF THE RINGS WAR RUN PLAY

declare(strict_types=1);

require_once 'FileManager/FileLoad.php';
require_once 'FileManager/FileWrite.php';
require_once 'Army/EvilArmy.php';
require_once 'Army/GoodArmy.php';
require_once 'Battle/ArmyPrepare.php';
require_once 'Battle/BattleManager.php';

$goodArmy = new GoodArmy();
$evilArmy = new EvilArmy();
$loadFromFile = new FileLoad();

$prepareTheArmies = new ArmyPrepare($goodArmy, $evilArmy, $loadFromFile);
$prepareTheArmies->createArmiesFromFile('moria.txt');

$battleManager = new BattleManager($prepareTheArmies);
$battleManager->startBattle();

echo $battleManager->getWonArmyDisplay()." won.".PHP_EOL;
echo 'Died in battle: ';

$lostInBattleWarriors = $battleManager->getWarriorsLostInBattle();

foreach ($lostInBattleWarriors as $lost){
    echo $lost->getName(). ', ';
}

$allWarriors = array_merge($evilArmy->getArmy(), $goodArmy->getArmy());

$writeToFile = new FileWrite();
$writeToFile->writeDataBackToFile($allWarriors,'warriorsAfterBattle.txt');





