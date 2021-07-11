<?php

declare(strict_types=1);

class PrepareTheArmies
{
    private array $goodWarriors;
    private array $evilWarriors;
    private GoodArmy $goodArmy;
    private EvilArmy $evilArmy;
    private LoadFromFile $loadFromFile;

    /**
     * PrepareTheArmies constructor.
     * @param GoodArmy $goodArmy
     * @param EvilArmy $evilArmy
     * @param LoadFromFile $loadFromFile
     */
    public function __construct(GoodArmy $goodArmy, EvilArmy $evilArmy, LoadFromFile $loadFromFile)
    {
        $this->goodWarriors = array();
        $this->evilWarriors = array();
        $this->goodArmy = $goodArmy;
        $this->evilArmy = $evilArmy;
        $this->loadFromFile = $loadFromFile;
    }

    public function createArmiesFromFile($filename):void{

        $allWarriors = $this->loadFromFile->loadWarriorsFromFile($filename);

        shuffle($allWarriors);

        $this->goodArmy->createArmy($allWarriors);
        $this->goodWarriors = $this->goodArmy->getArmy();

        $this->evilArmy->createArmy($allWarriors);
        $this->evilWarriors = $this->evilArmy->getArmy();

    }

    /**
     * @return array
     */
    public function getGoodWarriors(): array
    {
        return $this->goodWarriors;
    }


    /**
     * @return array
     */
    public function getEvilWarriors(): array
    {
        return $this->evilWarriors;
    }

}