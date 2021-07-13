<?php

class Hobbit extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $fightPower = (10 * $this->getStrength()) +
            (20 * $this->getIntelligence()) +
            (20 * $this->getCharisma());


        $this->setFightPower($fightPower);
    }


}