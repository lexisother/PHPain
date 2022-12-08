<?php
/**
 * Copyright (c) 2022+ Alyxia Sother
 *
 * Use of this source code is governed by an MIT-style
 * license that can be found in the LICENSE file or at
 * https://opensource.org/licenses/MIT.
 */

class Dice
{
    private int $value;

    function __construct(public int $amount)
    {
        $this->roll();
    }

    /**
     * Roll the die. Stores the value in $amount.
     *
     * @return void
     */
    public function roll(): void
    {
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