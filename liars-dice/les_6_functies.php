<?php
// Generate the "X-Y coordinate" board structure.
$board = [];
for ($i = 0; $i < 7; $i++) {
  $board[$i] = [];
  for ($j = 0; $j < 10; $j++) {
    $board[$i][$j] = "";
  }
}
// Now, we can access the whole board using coordinates like $board[3][4] = "x"

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
