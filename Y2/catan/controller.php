<?php
/**
 * Copyright (c) 2022+ Alyxia Sother
 *
 * Use of this source code is governed by an MIT-style
 * license that can be found in the LICENSE file or at
 * https://opensource.org/licenses/MIT.
 */

include_once "lists.php";
include_once "dice.php";
include_once "board.php";
include_once "player.php";
include_once "bank.php";

class Controller
{
    private Dice $dice;
    private Board $board;
    private Bank $bank;
    /** @var Player[] */
    private array $players;
    private int $turn;
    private bool $phaseOne;

    public function __construct(
        array $names
    )
    {
        $this->dice = new Dice(2);
        $this->board = new Board();
        $this->bank = new Bank();
        for ($i = 0; $i < count($names); $i++) {
            $this->players[$i] = new Player($i + 1, $names[$i]);
        }
        $this->phaseOne = true;
        $this->turn = 0;
    }

    public function placeBuilding(): void
    {
        if (isset($_GET['road'])) {
            if ($this->checkRoadConnection($_GET['road'])) {
                $piece = $this->players[$this->turn]->givePiece("road");
                if ($piece != null) {
                    $id = $_GET['road'];
                    $this->board->placeBuilding($piece, $id);
                    if ($this->phaseOne) {
                        $this->endTurn();
                    }
                }
            }
        } elseif (isset($_GET['city'])) {
            if ($this->checkCityConnection($_GET['city'])) {
                $piece = $this->players[$this->turn]->givePiece("village");
                if ($piece != null) {
                    $id = $_GET['city'];
                    $this->board->placeBuilding($piece, $id);
                }
            }
        } elseif (isset($_GET['village'])) {
            if ($this->board->checkBuilding($_GET['village']) == "P" . $this->players[$this->turn]->getId()) {
                $piece = $this->players[$this->turn]->givePiece("city");
                if ($piece != null) {
                    $this->players[$this->turn]->receivePiece('village');
                    $id = $_GET['village'];
                    $this->board->placeBuilding($piece, $id);
                }
            }
        }
    }

    private function checkRoadConnection(int $id): bool
    {
        $cities = Lists::getRoadToCity($id);
        foreach ($cities as $cityId) {
            if ("P" . $this->players[$this->turn]->getId() == $this->board->checkBuilding($cityId)) {
                return true;
            }
        }

        $roads = Lists::getRoadToRoad($id);
        foreach ($roads as $roadId) {
            if ("P" . $this->players[$this->turn]->getId() == $this->board->checkRoad($roadId)) {
                return true;
            }
        }

        return false;
    }

    public function endTurn(): void
    {
        $this->turn++;
        if ($this->turn == count($this->players)) {
            $this->turn = 0;
        }
        if (!$this->phaseOne) {
            $this->generateResources();
        } else {
            if ($this->turn == count($this->players) * 2) {
                $this->phaseOne = false;
            }
        }
    }

    public function generateResources(): void
    {
        $this->dice->roll();
        if ($this->dice->getValue() != 7) {
            foreach ($this->board->tiles as $key => $tile) {
                if ($tile->getNumber() == $this->dice->getValue()) {
                    $cities = Lists::getTileToCity($key);
                    $resource = $tile->getType();
                    $resource = $this->bank->getResource($resource);
                    if ($resource != null) {
                        foreach ($cities as $city) {
                            if ($this->board->buildings[$city]->getColour() != "") {
                                $color = $this->board->buildings[$city]->getColour();
                                $playerId = ((int)substr($color, -1)) - 1;
                                $this->players[$playerId]->receiveResource($resource);
                                if ($this->board->buildings[$city]->getType() == 'city') {
                                    $this->players[$playerId]->receiveResource($resource);
                                }
                            }
                        }
                    }
                }
            }
        } else {

        }
//        $rolled = $this->dice->getValue();
//
//        $tiles = [];
//        foreach ($this->board->tiles as $key => $tile) {
//            if ($tile->getNumber() == $rolled) {
//                $tiles[] = $key;
//            }
//        }
//
//        $cities = [];
//        for ($i = 0; $i < count($tiles); $i++) {
//            $cities[] = Lists::getTileToCity($tiles[$i]);
//        }
//
//        foreach ($cities as $city) {
//            if ($this->board->buildings[$city]->getColour() != "") {
//                $color = $this->board->buildings[$city]->getColour();
//                $playerId = substr($color, -1);
//            }
//        }

        /*
         * 👍 uitkomst van roll bekijken
         * 👍 welke tegels heben het getal wat gedobbeld is
         * 👍 welk dorp of stad ligt aan die tegel die gedobbeld is
         * van wie is het dorp dan aan de tegel ligt die gedobbeld is
         * welke resources geeft de tegel die gedobbeld is
         * geef de speler de resources wanneer hij dat dorp heeft wat we net berekend hebben
         * geef de speler die een stad heeft nog een resource
         */

        /*
         * --bonus
         * rover..,,,..,...,,.. mhhnghmhnmhgmh,,..
         */
    }

    private function checkCityConnection(int $city): bool
    {
        $cities = Lists::getCityToCities($city);
        foreach ($cities as $cityId) {
            if ("P" . $this->players[$this->turn]->getId() == $this->board->checkBuilding($cityId)) {
                return true;
            }
        }

        $roads = Lists::getCityToRoad($city);
        foreach ($roads as $roadId) {
            if ("P" . $this->players[$this->turn]->getId() == $this->board->checkRoad($roadId)) {
                return true;
            }
        }

        if ($this->phaseOne) {
            return true;
        }
        return false;
    }

    public function __toString(): string
    {
        return "<catan>\n" . implode('', $this->players) . $this->board . "</catan>";
    }
}
