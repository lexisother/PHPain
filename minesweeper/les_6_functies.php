<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['game'])) {
  $board = $_SESSION['game'];
} else {
  $board = genEmptyBoard();
  $board = placeBomb($board, 10);
  $board = checkBombs($board);
}

function showBoard($board)
{
  echo "<table>";
  foreach ($board as $rows) {
    echo "<tr>";
    foreach ($rows as $row) {
      echo "<td>";
      echo $row;
      echo "</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}

function placeBomb($board, $aantal)
{
  for ($i = 0; $i < $aantal; $i++) {
    $rows = count($board);
    $columns = count($board[0]);
    $x = rand(0, $rows - 1);
    $y = rand(0, $columns - 1);
    if ($board[$x][$y] === "\x58") {
      $i--;
    } else {
      $board[$x][$y] = "\x58";
    }
  }
  return $board;
}

// Generate the "X-Y coordinate" board structure.
function genEmptyBoard()
{
  $board = [];
  for ($i = 0; $i < 7; $i++) {
    $board[$i] = [];
    for ($j = 0; $j < 10; $j++) {
      $board[$i][$j] = 0;
    }
  }
  return $board;
}

function checkBombs($board)
{
  for ($x = 0; $x < count($board); $x++) {
    for ($y = 0; $y < count($board[0]); $y++) {
      if ($board[$x][$y] === "\x58") {
        // Left {{{
        if ($y - 1 >= 0) {
          if ($board[$x][$y - 1] !== "\x58") {
            $board[$x][$y - 1] += 1;
          }

          if ($x - 1 >= 0) {
            if ($board[$x - 1][$y - 1] !== "\x58") {
              $board[$x - 1][$y - 1] += 1;
            }
          }

          if ($x + 1 < count($board)) {
            if ($board[$x + 1][$y - 1] !== "\x58") {
              $board[$x + 1][$y - 1] += 1;
            }
          }
        }
        // }}}

        // Right {{{
        if ($y + 1 < count($board[0])) {
          if ($board[$x][$y + 1] !== "\x58") {
            $board[$x][$y + 1] += 1;
          }
          if ($x - 1 >= 0) {
            if ($board[$x - 1][$y + 1] !== "\x58") {
              $board[$x - 1][$y + 1] += 1;
            }
          }
          if ($x + 1 < count($board)) {
            if ($board[$x + 1][$y + 1] !== "\x58") {
              $board[$x + 1][$y + 1] += 1;
            }
          }
        }
        // }}}

        // Above
        if ($x - 1 >= 0) {
          if ($board[$x - 1][$y] !== "\x58") {
            $board[$x - 1][$y] += 1;
          }
        }

        // Under
        if ($x + 1 < count($board)) {
          if ($board[$x + 1][$y] !== "\x58") {
            $board[$x + 1][$y] += 1;
          }
        }
      }
    }
  }

  return $board;
}
