<?php

class Player
{
    private array $pieces;
    private array $resources;

    public function __construct(
        private int    $id,
        private string $name,
    )
    {
        $this->pieces = [];
        for ($i = 0; $i < 4; $i++) {
            $this->pieces['cities'][] = new Building($i, "city", "P{$this->id}");
        }
        for ($i = 0; $i < 5; $i++) {
            $this->pieces['villages'][] = new Building($i, "village", "P{$this->id}");
        }
        for ($i = 0; $i < 15; $i++) {
            $this->pieces['roads'][] = new Building($i, "road", "P{$this->id}");
        }
        $this->resources = ["sheep" => 0, "stone" => 0, "wood" => 0, "ore" => 0, "wheat" => 0];
        console("Player {$this->id} created with " . count($this->pieces['cities']) . " cities,  " . count($this->pieces['villages']) . " villages, and " . count($this->pieces['roads']) . " roads.");
    }

    public function __toString(): string
    {
        $print = "<player id='P{$this->id}'>\n";
        $print .= "<h3>{$this->name}</h3>\n";
        $print .= "<buildings>\n";
        foreach ($this->pieces as $category) {
            foreach ($category as $piece) {
                $print .= $piece;
            }
        }
        $print .= "</buildings>\n";
        $print .= "<resources>\n";
        foreach ($this->resources as $resource => $amount) {
            $print .= "<card class='{$resource}'>\n";
            $print .= "<div></div>\n<p>";
            $print .= ($amount > 9) ? $amount : "0" . $amount;
            $print .= " X</p>";
            $print .= "</card>\n";
        }
        $print .= "</resources>\n";
        $print .= "</player>\n";
        return $print;
    }
}