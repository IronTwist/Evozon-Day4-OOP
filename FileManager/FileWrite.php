<?php


class FileWrite
{
    public function writeDataBackToFile(array $array, $filename): void
    {
        $allTheWarriors = $array;

        file_put_contents($filename, "");

        $file = fopen($filename, 'ab');

        foreach ($allTheWarriors as $warrior) {
            $serializedWarrior = serialize($warrior);
            fwrite($file, $serializedWarrior.PHP_EOL);
        }
    }
}