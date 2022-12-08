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
        $this->resources = ["sheep" => 10, "stone" => 10, "wood" => 10, "ore" => 10, "wheat" => 10];
        console("Player {$this->id} created with " . count($this->pieces['cities']) . " cities,  " . count($this->pieces['villages']) . " villages, and " . count($this->pieces['roads']) . " roads.");
    }

    public function __toString(): string
    {
        $print = "<player id='P{$this->id}'>\n";
        $print .= "<h3>{$this->name}</h3>\n";
        $print .= "<buildings>\n";
        foreach ($this->pieces as $category) {
            $print .= implode('', $category);
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

    public function givePiece(string $type): ?Building
    {
        if ($this->checkResources($type)) {
            return match ($type) {
                "road" => array_pop($this->pieces["roads"]),
                "village" => array_pop($this->pieces["villages"]),
                "city" => array_pop($this->pieces["cities"]),
            };
        }
        return null;
    }

    private function checkResources(string $type): bool
    {
        switch ($type) {
            case "road":
                if ($this->resources["wood"] > 0 && $this->resources["stone"] > 0) {
                    $this->resources["wood"]--;
                    $this->resources["stone"]--;
                    return true;
                }
                break;
            case "village":
                if ($this->resources["wood"] > 0 && $this->resources["stone"] > 0 && $this->resources["sheep"] > 0 && $this->resources["wheat"]) {
                    $this->resources["wood"]--;
                    $this->resources["stone"]--;
                    $this->resources["sheep"]--;
                    $this->resources["wheat"]--;
                    return true;
                }
                break;
            case "city":
                if ($this->resources["ore"] > 1 && $this->resources["wheat"] > 2) {
                    $this->resources["ore"] -= 2;
                    $this->resources["wheat"] -= 3;
                    return true;
                }
                break;
        }
        return false;
    }

    public function receivePiece(string $type): void
    {
        $i = count($this->pieces[$type . "s"]);
        $this->pieces[$type][$i] = new Building($i, $type, "P" . $this->id);

        // kept for posterity
        // $l = count($this->pieces[$type == "road" || $type == "village" ? $type . "s" : "cities"]);
        // $last = $this->pieces[$type == "road" || $type == "village" ? $type . "s" : "cities"][$l - 1];
        // $bld = new Building($l + 1, $type, "Pwhatever");
        // return match ($type) {
        //      "road" => array_push($this->pieces['roads'], $bld),
        //      "village" => array_push($this->pieces['villages'], $bld),
        //      "city" => array_push($this->pieces['cities'], $bld)
        // };
    }

    public function receiveResource(string $type): void
    {
        $this->resources[$type]++;
    }

    public function getId(): int
    {
        return $this->id;
    }
}