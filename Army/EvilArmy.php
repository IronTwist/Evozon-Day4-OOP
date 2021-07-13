<?php

declare(strict_types=1);

require_once __DIR__ . '/Army.php';
require_once __DIR__ . '/../Entity/Goblin.php';
require_once __DIR__ . '/../Entity/Orc.php';
require_once __DIR__ . '/../Entity/Trol.php';
require_once __DIR__ . '/../Entity/Balrog.php';

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

                        $warriorCreator = new Goblin();
                        $warriorCreator->setName($hero->getName());
                        $warriorCreator->setCharisma($hero->getCharisma());
                        $warriorCreator->setIntelligence($hero->getIntelligence());
                        $warriorCreator->setStrength($hero->getStrength());
                        $warriorCreator->setSide($hero->getSide());
                        $warriorCreator->calculateFightPower();

                        $this->army[] = $warriorCreator;
                    }

                    if ($hero->getname() === 'Orc') {

                        $warriorCreator = new Orc();
                        $warriorCreator->setName($hero->getName());
                        $warriorCreator->setCharisma($hero->getCharisma());
                        $warriorCreator->setIntelligence($hero->getIntelligence());
                        $warriorCreator->setStrength($hero->getStrength());
                        $warriorCreator->setSide($hero->getSide());
                        $warriorCreator->calculateFightPower();

                        $this->army[] = $warriorCreator;
                    }

                    if ($hero->getname() === 'Trol') {

                        $warriorCreator = new Trol();
                        $warriorCreator->setName($hero->getName());
                        $warriorCreator->setCharisma($hero->getCharisma());
                        $warriorCreator->setIntelligence($hero->getIntelligence());
                        $warriorCreator->setStrength($hero->getStrength());
                        $warriorCreator->setSide($hero->getSide());
                        $warriorCreator->calculateFightPower();

                        $this->army[] = $warriorCreator;
                    }

                    if ($hero->getname() === 'Balrog') {
                        $action = readline('Are you sure you want to send a Balrog to the battle? If no threow exception: [Yes/No]');

                        if ($action === 'Yes') {

                            $warriorCreator = new Balrog();
                            $warriorCreator->setName($hero->getName());
                            $warriorCreator->setCharisma($hero->getCharisma());
                            $warriorCreator->setIntelligence($hero->getIntelligence());
                            $warriorCreator->setStrength($hero->getStrength());
                            $warriorCreator->setSide($hero->getSide());
                            $warriorCreator->calculateFightPower();

                            $this->army[] = $warriorCreator;

                        } else if ($action === 'No') {
                            continue;
                        }else{
                            throw new Exception("You did not choose any option!");
                        }

                    }
                }
            }
        }catch (Exception $e){
            echo "Attention: ". $e->getMessage();
        }
    }
}
