<?php


class Dwarf extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $fightPower = (40 * $this->getStrength()) +
            (10 * $this->getIntelligence()) +
            (10 * $this->getCharisma());

        $this->setFightPower($fightPower);
    }
}