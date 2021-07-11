<?php

declare(strict_types=1);

require_once __DIR__ . '/ArmyInterface.php';

abstract class Army implements ArmyInterface {

    protected array $army = array();

    abstract public function createArmy(array $heroes):void;

    public function getArmy(): array
    {
        return $this->army;
    }

}
