<?php

class Dice
{
    private int $value;

    function __construct(public int $amount) {}

    /**
     * Roll the die. Stores the value in $amount.
     *
     * @return void
     */
    public function Roll(): void {
        $this->value = 0;
        for ($i = 0; $i < $this->amount; $i++) {
            $this->value += rand(1, 6);
        }
    }

    /**
     * Retrieve the dice value.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}