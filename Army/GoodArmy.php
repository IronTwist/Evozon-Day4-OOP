<?php

declare(strict_types=1);

require_once __DIR__ . '/Army.php';
require_once __DIR__ . '/../Entity/Hobbit.php';
require_once __DIR__ . '/../Entity/Elf.php';
require_once __DIR__ . '/../Entity/Man.php';
require_once __DIR__ . '/../Entity/Dwarf.php';
require_once __DIR__ . '/../Entity/Wizard.php';

class GoodArmy extends Army
{
    public function createArmy(array $heroes): void
    {
        foreach ($heroes as $hero) {
            if ($hero->getSide() === 'good') {
                if ($hero->getname() === 'Hobbit') {

                    $warriorCreator = new Hobbit();
                    $warriorCreator->setName($hero->getName());
                    $warriorCreator->setCharisma($hero->getCharisma());
                    $warriorCreator->setIntelligence($hero->getIntelligence());
                    $warriorCreator->setStrength($hero->getStrength());
                    $warriorCreator->setSide($hero->getSide());
                    $warriorCreator->calculateFightPower();

                    $this->army[] = $warriorCreator;
                }

                if ($hero->getname() === 'Elf') {

                    $warriorCreator = new Elf();
                    $warriorCreator->setName($hero->getName());
                    $warriorCreator->setCharisma($hero->getCharisma());
                    $warriorCreator->setIntelligence($hero->getIntelligence());
                    $warriorCreator->setStrength($hero->getStrength());
                    $warriorCreator->setSide($hero->getSide());
                    $warriorCreator->calculateFightPower();

                    $this->army[] = $warriorCreator;
                }

                if ($hero->getname() === 'Man') {

                    $warriorCreator = new Man();
                    $warriorCreator->setName($hero->getName());
                    $warriorCreator->setCharisma($hero->getCharisma());
                    $warriorCreator->setIntelligence($hero->getIntelligence());
                    $warriorCreator->setStrength($hero->getStrength());
                    $warriorCreator->setSide($hero->getSide());
                    $warriorCreator->calculateFightPower();

                    $this->army[] = $warriorCreator;
                }

                if ($hero->getname() === 'Dwarf') {

                    $warriorCreator = new Dwarf();
                    $warriorCreator->setName($hero->getName());
                    $warriorCreator->setCharisma($hero->getCharisma());
                    $warriorCreator->setIntelligence($hero->getIntelligence());
                    $warriorCreator->setStrength($hero->getStrength());
                    $warriorCreator->setSide($hero->getSide());
                    $warriorCreator->calculateFightPower();

                    $this->army[] = $warriorCreator;
                }

                if ($hero->getname() === 'Wizard') {

                    $warriorCreator = new Wizard();
                    $warriorCreator->setName($hero->getName());
                    $warriorCreator->setCharisma($hero->getCharisma());
                    $warriorCreator->setIntelligence($hero->getIntelligence());
                    $warriorCreator->setStrength($hero->getStrength());
                    $warriorCreator->setSide($hero->getSide());
                    $warriorCreator->calculateFightPower();

                    $this->army[] = $warriorCreator;
                }

            }
        }
    }
}