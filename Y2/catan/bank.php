<?php

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