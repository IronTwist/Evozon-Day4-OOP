<?php

declare(strict_types=1);

require_once 'Entity/ChildrenOfIluvatar.php';

class FileLoadAndWrite{

    public function loadWarriorsFromFile($filename): array{
        $heroesArray = array();

        $file = fopen($filename, 'rb');

        while(! feof($file)){
            $result = fgets($file);
            $hero  = unserialize($result);

            $heroesArray[] = $hero;

        }

        fclose($file);

        return $heroesArray;
    }

    public function writeWarriorsBackToFile(EvilArmy $evilArmy, GoodArmy $goodArmy, $filename)
    {
        $evilWarriors = $evilArmy->getArmy();
        $goodWarriors = $goodArmy->getArmy();

        $allTheWarriors = array_merge($evilWarriors, $goodWarriors);

        file_put_contents($filename, "");

        $file = fopen($filename, 'ab');

        foreach ($allTheWarriors as $warrior) {
            $serializedWarrior = serialize($warrior);
            fwrite($file, $serializedWarrior.PHP_EOL);
        }
    }
}