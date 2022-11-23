<?php
include_once "building.php";
include_once "tile.php";

class Board
{
    /** @var Tile[] */
    public array $tiles;
    public array $docks;
    /** @var Building[] */
    public array $buildings;
    /** @var Building[] */
    public array $roads;

    public function __construct()
    {
        for ($i = 1; $i < 20; $i++) {
            $this->tiles[$i] = new Tile($i, "wood");
        }
        for ($i = 1; $i < 55; $i++) {
            $this->buildings[$i] = new Building($i, "city", "");
        }
        for ($i = 72; $i > 0; $i--) {
            $this->roads[$i] = new Building($i, "road", "");
        }
    }

    public function __toString(): string
    {
        $print = "<board>\n";
        $print .= $this->cityRow(1, 8);
        $print .= $this->tileRow(1, 4);
        $print .= $this->cityRow(8, 17);
        $print .= $this->tileRow(1, 5);
        $print .= $this->cityRow(17, 28);
        $print .= $this->tileRow(1, 6);
        $print .= $this->cityRow(28, 39);
        $print .= $this->tileRow(1, 5);
        $print .= $this->cityRow(39, 48);
        $print .= $this->tileRow(1, 4);
        $print .= $this->cityRow(48, 55);
        $print .= "</board>\n";
        return $print;
    }

    // TODO: Refactor the below functions into one

    /**
     * Print out a city row.
     *
     * @param int $start
     * @param int $stop
     * @return string
     */
    private function cityRow(int $start, int $stop): string
    {
        $print = "<cityrow>\n";
        for ($i = $start; $i < $stop; $i++) {
            $print .= $this->buildings[$i];
            if ($i != $stop - 1) {
                $print .= array_pop($this->roads);
            }
        }
        $print .= "</cityrow>\n<br/>\n";
        return $print;
    }


    /**
     * Print out a tile row.
     *
     * @param int $start
     * @param int $stop
     * @return string
     */
    private function tileRow(int $start, int $stop): string
    {
        $print = "<tilerow>\n";
        $print .= array_pop($this->roads);
        for ($i = $start; $i < $stop; $i++) {
            $print .= $this->tiles[$i];
            $print .= array_pop($this->roads);
        }
        $print .= "</tilerow>\n<br/>\n";
        return $print;
    }
}