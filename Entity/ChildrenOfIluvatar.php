<?php

declare(strict_types=1);

class ChildrenOfIluvatar{
    private string $name;
    private ?string $side = null;
    private float $strength;
    private float $intelligence;
    private float $charisma;
    private float $fightPower;
    private float $supernaturalAbility;
    private bool $isDead = false;

    public function __construct()
    {

    }

    public function isStrongerThanOtherChildrenOfIlluvatar(ChildrenOfIluvatar $childrenOfIluvatar): bool
    {
        return ($this->getFightPower()) > ($childrenOfIluvatar->getFightPower());
    }

    public function isDead():bool
    {
       return $this->isDead;
    }

    public function setIsDead(bool $bool):void
    {
        $this->isDead = $bool;
    }
    /**
     * @return float
     */
    public function getSupernaturalAbility(): float
    {
        return $this->supernaturalAbility;
    }

    /**
     * @param float $supernaturalAbility
     */
    public function setSupernaturalAbility(float $supernaturalAbility): void
    {
        $this->supernaturalAbility = $supernaturalAbility;
    }

    /**
     * @return string
     */
    public function getSide(): string
    {
        return $this->side;
    }

    /**
     * @param string $side
     */
    public function setSide(string $side): void
    {
        $this->side = $side;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getStrength(): float
    {
        return $this->strength;
    }

    /**
     * @param float $strength
     */
    public function setStrength(float $strength): void
    {
        $this->strength = $strength;
    }

    /**
     * @return float
     */
    public function getIntelligence(): float
    {
        return $this->intelligence;
    }

    /**
     * @param float $intelligence
     */
    public function setIntelligence(float $intelligence): void
    {
        $this->intelligence = $intelligence;
    }

    /**
     * @return float
     */
    public function getCharisma(): float
    {
        return $this->charisma;
    }

    /**
     * @param float $charisma
     */
    public function setCharisma(float $charisma): void
    {
        $this->charisma = $charisma;
    }

    /**
     * @return float
     */
    public function getFightPower(): float
    {
        return $this->fightPower;
    }

    /**
     * @param float $fightPower
     */
    public function setFightPower(float $fightPower): void
    {
        $this->fightPower = $fightPower;
    }

    public function __unserialize(array $data): void
    {
        $this->name = $data['name'];
        $this->side = $data['side'];
        $this->strength = $data['strength'];
        $this->intelligence = $data['intelligence'];
        $this->charisma = $data['charisma'];
    }

    public function __serialize(): array
    {
        return [
            'name' => $this->getName(),
            'side' => $this->getSide(),
            'strength' => $this->getStrength(),
            'intelligence' => $this->getIntelligence(),
            'charisma' => $this->getCharisma()
        ];
    }

}