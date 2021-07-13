<?php


class Trol extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $this->setSupernaturalAbility(0.6);

        $fightPower = (50 * $this->getStrength()) +
            (1 * $this->getIntelligence()) +
            (1 * $this->getCharisma()) +
            (10 * $this->getSupernaturalAbility());

        $this->setFightPower($fightPower);
    }
}