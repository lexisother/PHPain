<?php

include_once "board.php";
include_once "player.php";

class Controller
{
    private Board $board;
    /** @var Player[] */
    private array $players;

    public function __construct(
        array $names
    )
    {
        $this->board = new Board();
        for ($i = 0; $i < count($names); $i++) {
            $this->players[$i] = new Player($i + 1, $names[$i]);
        }
    }

    public function __toString(): string
    {
        return "<catan>\n" . implode('', $this->players) . $this->board . "</catan>";
    }
}
