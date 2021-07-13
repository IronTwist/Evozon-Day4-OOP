<?php


class Man extends ChildrenOfIluvatar
{
    public function calculateFightPower(): void
    {
        $fightPower = (30 * $this->getStrength()) +
            (30 * $this->getIntelligence()) +
            (10 * $this->getCharisma());

        $this->setFightPower($fightPower);
    }
}