<?php
/**
 * Copyright (c) 2022+ Alyxia Sother
 *
 * Use of this source code is governed by an MIT-style
 * license that can be found in the LICENSE file or at
 * https://opensource.org/licenses/MIT.
 */

class Bank
{
    public function __construct(
        public array $resources = ["sheep" => 50, "stone" => 50, "wood" => 50, "ore" => 50, "wheat" => 50],
    )
    {
    }

    public function getResource(string $name): string|null
    {
        if ($this->resources[$name] > 0) {
            $this->resources[$name]--;
            return $name;
        }
        return null;

    }

    public function setResource(string $name): void
    {
        $this->resources[$name]++;
    }
}