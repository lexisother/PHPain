<?php
if (isset($_SESSION['game'])) {
  $board = $_SESSION['game'];
} else {
  $board = genEmptyBoard();
  $board = placeBomb($board, 10);
}

function showBoard($board)
{
  echo '<table>';
  for ($i = 0; $i < 7; $i++) {
    echo '<tr>';
    for ($j = 0; $j < 10; $j++) {
      echo '<td>';
      echo $board[$i][$j];
      echo '</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
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
      $board[$i][$j] = "";
    }
  }
  return $board;
}
