<?php

declare(strict_types=1);

require_once 'Entity/ChildrenOfIluvatar.php';

class LoadFromFile{

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
}