<?php

declare(strict_types=1);

require_once 'Entity/ChildrenOfIluvatar.php';


class BattleManager
{
    private PrepareTheArmies $prepareTheArmies;
    private array $defeatedWarriors;
    private ?string $wonArmyDisplay = null;
    private ?string $losingArmyDisplay = null;

    /**
     * BattleManager constructor.
     * @param PrepareTheArmies $prepareTheArmies
     */
    public function __construct(PrepareTheArmies $prepareTheArmies)
    {
        $this->prepareTheArmies = $prepareTheArmies;
        $this->defeatedWarriors = array();
    }

    public function startBattle(): void
    {
       $evilWarriors = $this->prepareTheArmies->getEvilWarriors();
       $goodWarriors = $this->prepareTheArmies->getGoodWarriors();

       $x = 0;
       while($x < 5){
           shuffle($evilWarriors);
           shuffle($goodWarriors);
           $x++;
       }

       while(!empty($evilWarriors) && !empty($goodWarriors)){
           $evilWarriorGoToFight = array_shift($evilWarriors);
           $goodWarriorGoToFight = array_shift($goodWarriors);

           if(!empty($evilWarriorGoToFight || !empty($goodWarriorGoToFight))){
               $winner =  $this->fight($evilWarriorGoToFight, $goodWarriorGoToFight);
               var_dump($winner);

               if(!empty($evilWarriors)){
                   try {
                       if($winner->getSide() === 'evil' && is_string($winner->getSide())){
                           $evilWarriors[] = $winner;
                       }
                   }catch (Error $e){
                       echo "I found an error: ". $e->getMessage();
                   }

               }else{
                   $this->wonArmyDisplay = "Good side!";
               }

               if(!empty($goodWarriors)){
                   if($winner->getSide() === 'good'  && is_string($winner->getSide())){
                       $goodWarriors[] = $winner;
                   }
               }else{
                   $this->losingArmyDisplay = "Evil side!";
               }

           }
       }
    }

    public function fight(ChildrenOfIluvatar $evilWarrior, ChildrenOfIluvatar $goodWarrior): ChildrenOfIluvatar
    {
        $checkEvilWarriorIfIsStronger = $evilWarrior->isStrongerThanOtherChildrenOfIlluvatar($goodWarrior);
        $checkGoodWarriorIfIsStronger = $goodWarrior->isStrongerThanOtherChildrenOfIlluvatar($evilWarrior);

        if($checkEvilWarriorIfIsStronger === true){
            $remainFightPower = $evilWarrior->getFightPower() - $goodWarrior->getFightPower();

            if($remainFightPower < 0){
                $remainFightPower = 0;
            }

            $evilWarrior->setFightPower($remainFightPower);
            $goodWarrior->setIsDead(true);
            $this->defeatedWarriors($goodWarrior);

            return $evilWarrior;
        }

        if($checkGoodWarriorIfIsStronger === true){
            $remainFightPower = $goodWarrior->getFightPower() - $evilWarrior->getFightPower();

            if($remainFightPower < 0){
                $remainFightPower = 0;
            }

            $goodWarrior->setFightPower($remainFightPower);
            $evilWarrior->setIsDead(true);
            $this->defeatedWarriors($evilWarrior);

            return $goodWarrior;
        }

        return new ChildrenOfIluvatar();
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

    /**
     * @return string|null
     */
    public function getLosingArmyDisplay(): ?string
    {
        return $this->losingArmyDisplay;
    }


}