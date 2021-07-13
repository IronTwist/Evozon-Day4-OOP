<?php

declare(strict_types=1);

require_once 'Entity/ChildrenOfIluvatar.php';

class FileLoad{

    public function loadWarriorsFromFile($filename): array{
        $heroesArray = array();
        //TODO condition and split functions and use try catch $file
        $file = fopen($filename, 'rb');

        while(! feof($file)){
            $result = fgets($file);
            $hero  = unserialize($result);

            $heroesArray[] = $hero;

        }

        fclose($file);

        return $heroesArray;
    }

}