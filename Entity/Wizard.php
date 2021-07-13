<?php


class Wizard extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $this->setSupernaturalAbility(0.8);

        $fightPower = (20 * $this->getStrength()) +
            (30 * $this->getIntelligence() + 5) +
            (5 * $this->getCharisma()) +
            (20* $this->getSupernaturalAbility());

        $this->setFightPower($fightPower);
    }

}