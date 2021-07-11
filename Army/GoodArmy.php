<?php

declare(strict_types=1);

require_once __DIR__ . '/Army.php';

class GoodArmy extends Army
{
    public function createArmy(array $heroes): void
    {
        foreach ($heroes as $hero) {
            if ($hero->getSide() === 'good') {
                if ($hero->getname() === 'Hobbit') {

                    $fightPower = (10 * $hero->getStrength()) +
                        (20 * $hero->getIntelligence()) +
                        (20 * $hero->getCharisma());

                    $hero->setFightPower($fightPower);

                    $this->army[] = $hero;
                }

                if ($hero->getname() === 'Elf') {

                    $hero->setSupernaturalAbility(0.8);

                    $fightPower = (30 * $hero->getStrength()) +
                        (30 * $hero->getIntelligence()) +
                        (5 * $hero->getCharisma()) +
                        (10 * $hero->getSupernaturalAbility());


                    $hero->setFightPower($fightPower);

                    $this->army[] = $hero;
                }

                if ($hero->getname() === 'Man') {

                    $fightPower = (30 * $hero->getStrength()) +
                        (30 * $hero->getIntelligence()) +
                        (10 * $hero->getCharisma());

                    $hero->setFightPower($fightPower);

                    $this->army[] = $hero;
                }

                if ($hero->getname() === 'Dwarf') {

                    $fightPower = (40 * $hero->getStrength()) +
                        (10 * $hero->getIntelligence()) +
                        (10 * $hero->getCharisma());

                    $hero->setFightPower($fightPower);

                    $this->army[] = $hero;
                }

                if ($hero->getname() === 'Wizard') {

                    $hero->setSupernaturalAbility(0.8);

                    $fightPower = (20 * $hero->getStrength()) +
                        (30 * $hero->getIntelligence() + 5) +
                        (5 * $hero->getCharisma()) +
                        (20* $hero->getSupernaturalAbility());

                    $hero->setFightPower($fightPower);

                    $this->army[] = $hero;
                }

            }
        }
    }
}