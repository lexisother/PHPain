<?php
include_once "building.php";
include_once "tile.php";

class Board
{
    /** @var Tile[] */
    public array $tiles;
    public array $docks;
    /** @var int[] */
    public array $buildings;
    public array $roads;

    public function __construct()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->tiles[] = new Tile($i, "wood");
        }
        for ($i = 0; $i < 55; $i++) {
            $this->buildings[] = new Building("", "");
        }
        for ($i = 0; $i < 72; $i++) {
            $this->roads[] = new Building("road", "");
        }
    }
}