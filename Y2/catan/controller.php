<?php

include_once "board.php";
include_once "player.php";

class Controller
{
    private Board $board;
    /** @var Player[] */
    private array $players;
    private int $turn;

    public function __construct(
        array $names
    )
    {
        $this->board = new Board();
        for ($i = 0; $i < count($names); $i++) {
            $this->players[$i] = new Player($i + 1, $names[$i]);
        }
        $this->turn = 0;
    }

    public function placeBuilding(): void
    {
        if (isset($_GET['road'])) {
            $piece = $this->players[$this->turn]->givePiece("road");
            if ($piece != null) {
                $id = $_GET['road'];
                $this->board->placeBuilding($piece, $id);
            }
        } elseif (isset($_GET['city'])) {
            $piece = $this->players[$this->turn]->givePiece("village");
            if ($piece != null) {
                $id = $_GET['city'];
                $this->board->placeBuilding($piece, $id);
            }
        } elseif (isset($_GET['village'])) {
            $piece = $this->players[$this->turn]->givePiece("city");
            if ($piece != null) {
                $this->players[$this->turn]->receivePiece('village');
                $id = $_GET['village'];
                $this->board->placeBuilding($piece, $id);
            }
        }
    }

    public function __toString(): string
    {
        return "<catan>\n" . implode('', $this->players) . $this->board . "</catan>";
    }
}
