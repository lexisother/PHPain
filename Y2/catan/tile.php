<?php

class Tile
{
    public function __construct(
        private readonly int    $number,
        private readonly string $type,
        private bool            $robber = false,
    )
    {
    }

    public function GiveResources(): string
    {
        return $this->type;
    }

    public function __toString(): string
    {
        $print = "<tile class='{$this->type}'>";
        $print .= "<fiche>{$this->number}</fiche>";
        $print .= "</tile>\n";
        return $print;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return match ($this->type) {
            "grass" => "sheep",
            default => $this->type
        };
    }
}