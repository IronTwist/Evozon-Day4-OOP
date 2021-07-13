<?php

declare(strict_types=1);

require_once 'Entity/ChildrenOfIluvatar.php';

class BattleManager
{
    private ArmyPrepare $prepareTheArmies;
    private array $defeatedWarriors;
    private ?string $wonArmyDisplay = null;

    /**
     * BattleManager constructor.
     * @param ArmyPrepare $prepareTheArmies
     */
    public function __construct(ArmyPrepare $prepareTheArmies)
    {
        $this->prepareTheArmies = $prepareTheArmies;
        $this->defeatedWarriors = array();
    }

    public function startBattle(): void
    {
       $evilWarriors = $this->prepareTheArmies->getEvilWarriors();
       $goodWarriors = $this->prepareTheArmies->getGoodWarriors();

       $x = 0;
       while($x < 2){
           shuffle($evilWarriors);
           shuffle($goodWarriors);
           $x++;
       }

       while(!empty($evilWarriors) && !empty($goodWarriors)){
           $evilWarriorGoToFight = array_shift($evilWarriors);
           $goodWarriorGoToFight = array_shift($goodWarriors);

           if(!empty($evilWarriorGoToFight || !empty($goodWarriorGoToFight))){

               $winnerVsLooser =  $this->fight($evilWarriorGoToFight, $goodWarriorGoToFight);

               // Display fights

               if($winnerVsLooser[0]->getSide() === 'good'){
                    printf("-%s defeated %s.\n", $winnerVsLooser[0]->getName(),$winnerVsLooser[1]->getName());
               }

               if($winnerVsLooser[0]->getSide() === 'evil'){
                   printf("-%s defeated %s. \n", $winnerVsLooser[0]->getName(),$winnerVsLooser[1]->getName());
               }

               //Check to see if looser is dead or no

               if($winnerVsLooser[1]->isDead() === false && $winnerVsLooser[1]->getSide() === 'evil'){
                   $evilWarriors[] = $winnerVsLooser[1];
               }

               if($winnerVsLooser[1]->isDead() === false && $winnerVsLooser[1]->getSide() === 'good'){
                   $goodWarriors[] = $winnerVsLooser[1];
               }



           }

           if(empty($evilWarriors) && !empty($goodWarriors)){
               $this->wonArmyDisplay = "Good side!";
           }

           if(empty($goodWarriors) && !empty($evilWarriors)){
               $this->wonArmyDisplay = "Evil side!";
           }
       }
    }

    public function fight(ChildrenOfIluvatar $evilWarrior, ChildrenOfIluvatar $goodWarrior): ?array
    {
        $winnerVsLooser = [];

        $checkEvilWarriorIfIsStronger = $evilWarrior->isStrongerThanOtherChildrenOfIlluvatar($goodWarrior);
        $checkGoodWarriorIfIsStronger = $goodWarrior->isStrongerThanOtherChildrenOfIlluvatar($evilWarrior);

        if($checkEvilWarriorIfIsStronger === true) {
            $remainFightPower = $evilWarrior->getFightPower() - $goodWarrior->getFightPower();

            if ($remainFightPower < 0) {
                $remainFightPower = 0;
            }

            $evilWarrior->setFightPower($remainFightPower);

            $winnerVsLooser[] = $evilWarrior;

            try {
                $randChanceToDie = random_int(1, 2);


            if ($randChanceToDie === 2) {
                $goodWarrior->setIsDead(true);
                $this->defeatedWarriors($goodWarrior);
                $winnerVsLooser[] = $goodWarrior;
            }

            if($randChanceToDie === 1) {
                $winnerVsLooser[] = $goodWarrior;
            }

            } catch (Exception $e) {
                echo "Exception trown: ".$e->getMessage();
            }

            return $winnerVsLooser;
        }

        if($checkGoodWarriorIfIsStronger === true){
            $remainFightPower = $goodWarrior->getFightPower() - $evilWarrior->getFightPower();

            if($remainFightPower < 0){
                $remainFightPower = 0;
            }

            $goodWarrior->setFightPower($remainFightPower);

            $winnerVsLooser[] = $goodWarrior;

            try {
                $randChanceToDie = random_int(1, 2);


            if ($randChanceToDie === 2) {
                $evilWarrior->setIsDead(true);
                $this->defeatedWarriors($evilWarrior);
                $winnerVsLooser[] = $evilWarrior;
            }

            if($randChanceToDie === 1) {
                $winnerVsLooser[] = $evilWarrior;
            }

            } catch (Exception $e) {
                echo "Exception thrown: ".$e->getMessage();
            }

            return $winnerVsLooser;
        }

        return null;
    }

    private function defeatedWarriors(ChildrenOfIluvatar $childrenOfIluvatar):void
    {
        $this->defeatedWarriors[] = $childrenOfIluvatar;
    }

    public function getWarriorsLostInBattle(): array
    {
        return $this->defeatedWarriors;
    }

    /**
     * @return string|null
     */
    public function getWonArmyDisplay(): ?string
    {
        return $this->wonArmyDisplay;
    }

}