<?php


class Balrog extends  ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $this->setSupernaturalAbility(0.9);

        $fightPower = (60 * $this->getStrength()) +
            (5 * $this->getIntelligence()) +
            (1 * $this->getCharisma()) +
            (300 * $this->getSupernaturalAbility());

        $this->setFightPower($fightPower);
    }
}