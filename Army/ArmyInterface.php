<?php

declare(strict_types=1);

interface ArmyInterface
{
    public function createArmy(array $heroes): void;
    public function getArmy(): array;
}