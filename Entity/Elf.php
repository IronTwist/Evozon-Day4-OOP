<?php


class Elf extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $this->setSupernaturalAbility(0.8);

        $fightPower = (30 * $this->getStrength()) +
            (30 * $this->getIntelligence()) +
            (5 * $this->getCharisma()) +
            (10 * $this->getSupernaturalAbility());


        $this->setFightPower($fightPower);
    }
}