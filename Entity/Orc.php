<?php


class Orc extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $this->setSupernaturalAbility(0.6);

        $fightPower = (30 * $this->getStrength()) +
            (10 * $this->getIntelligence()) +
            (1 * $this->getCharisma()) +
            (5 * $this->getSupernaturalAbility());

        $this->setFightPower($fightPower);
    }
}