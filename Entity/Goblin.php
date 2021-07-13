<?php


class Goblin extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $this->setSupernaturalAbility(0.5);

        $fightPower = (20 * $this->getStrength()) +
            (10 * $this->getIntelligence()) +
            (1 * $this->getCharisma()) +
            (5 * $this->getSupernaturalAbility());

        $this->setFightPower($fightPower);
    }
}