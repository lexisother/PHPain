<?php

class Tile
{
    public function __construct(
        public int             $number,
        public readonly string $type,
        public bool            $robber = false,
    )
    {
    }

    public function setRobber(bool $set = false): void
    {
        $this->number = $set;
    }

    public function GiveResources(): string
    {
        return $this->type;
    }

    public function __toString(): string
    {
        $print = "<tile>";

        $print .= "</tile>\n";
        return $print;
    }
}