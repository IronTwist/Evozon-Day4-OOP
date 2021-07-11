<?php

declare(strict_types=1);

require_once __DIR__ . '/Army.php';

class EvilArmy extends Army {

    /**
     * @throws Exception
     */
    public function createArmy(array $heroes): void
    {
        try {
            foreach ($heroes as $hero) {
                if ($hero->getSide() === 'evil') {
                    if ($hero->getname() === 'Goblin') {

                        $hero->setSupernaturalAbility(0.5);

                        $fightPower = (20 * $hero->getStrength()) +
                            (10 * $hero->getIntelligence()) +
                            (1 * $hero->getCharisma()) +
                            (5 * $hero->getSupernaturalAbility());

                        $hero->setFightPower($fightPower);

                        $this->army[] = $hero;
                    }

                    if ($hero->getname() === 'Orc') {

                        $hero->setSupernaturalAbility(0.6);

                        $fightPower = (30 * $hero->getStrength()) +
                            (10 * $hero->getIntelligence()) +
                            (1 * $hero->getCharisma()) +
                            (5 * $hero->getSupernaturalAbility());

                        $hero->setFightPower($fightPower);

                        $this->army[] = $hero;
                    }

                    if ($hero->getname() === 'Trol') {

                        $hero->setSupernaturalAbility(0.6);

                        $fightPower = (50 * $hero->getStrength()) +
                            (1 * $hero->getIntelligence()) +
                            (1 * $hero->getCharisma()) +
                            (10 * $hero->getSupernaturalAbility());

                        $hero->setFightPower($fightPower);

                        $this->army[] = $hero;
                    }

                    if ($hero->getname() === 'Balrog') {
                        $action = readline('Are you sure you want to send a Balrog to the battle? If no threow exception: [Yes/No]');

                        if ($action === 'Yes') {
                            $hero->setSupernaturalAbility(0.9);

                            $fightPower = (60 * $hero->getStrength()) +
                                (5 * $hero->getIntelligence()) +
                                (1 * $hero->getCharisma()) +
                                (300 * $hero->getSupernaturalAbility());

                            $hero->setFightPower($fightPower);

                            $this->army[] = $hero;

                            throw new Exception("You are about to send a Balrog to the war!");
                        } else if ($action === 'No') {
                            continue;
                        }

                    }
                }
            }
        }catch (Exception $e){
            echo "Attention: ". $e->getMessage();
        }
    }
}
