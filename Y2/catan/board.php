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
        for ($i = 0; $i < 20; $i++) {
            $this->tiles[] = new Tile($i, "wood");
        }
        for ($i = 0; $i < 55; $i++) {
            $this->buildings[] = new Building("city", "");
        }
        for ($i = 0; $i < 72; $i++) {
            $this->roads[] = new Building("road", "");
        }
    }

    public function __toString(): string
    {
        $print = "<board>\n";
        $print .= $this->cityRow(1, 8);
        $print .= $this->tileRow(1, 4);
        $print .= $this->cityRow(1, 10);
        $print .= $this->tileRow(1, 5);
        $print .= $this->cityRow(1, 12);
        $print .= $this->tileRow(1, 6);
        $print .= $this->cityRow(1, 12);
        $print .= $this->tileRow(1, 5);
        $print .= $this->cityRow(1, 10);
        $print .= $this->tileRow(1, 4);
        $print .= $this->cityRow(1, 8);
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