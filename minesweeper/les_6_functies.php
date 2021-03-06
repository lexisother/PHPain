<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['game'])) {
  $board = $_SESSION['game'];
  $selection = $_SESSION['selection'];
} else {
  $x = 7;
  $y = 10;
  $bombs = 10;
  if (isset($_POST["GO"])) {
    $x = $_POST["X"];
    $y = $_POST["Y"];
    $bombs = $_POST['bombs'];
  }
  $board = genEmptyBoard($x, $y);
  $selection = array_fill(0, ($x * $y), true);
  $board = placeBomb($board, $bombs);
  $board = checkBombs($board);
}

function showBoard($board, $selection)
{
  $id = 1;
  echo "<table>";
  foreach ($board as $rows) {
    echo "<tr>";
    foreach ($rows as $col) {
      if ($selection[$id - 1]) {
        echo "<td onclick='window.location.href=`?click={$id}`'><button></button></td>";
      } else {
        echo "<td ";
        colour($col);
        echo ">{$col}</td>";
      }
      $id++;
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
function genEmptyBoard($x, $y)
{
  $board = [];
  for ($i = 0; $i < $x; $i++) {
    $board[$i] = [];
    for ($j = 0; $j < $y; $j++) {
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

function colour($number)
{
  switch ($number) {
    case 1:
      echo " class='blue' ";
      break;
    case 2:
      echo " class='green' ";
      break;
    case 3:
      echo " class='yellow' ";
      break;
    case 4:
      echo " class='purple' ";
      break;
    case 5:
      echo " class='orange' ";
      break;
    case 6:
      echo " class='magenta' ";
      break;
    case 7:
      echo " class='pink' ";
      break;
    case 8:
      echo " class='chocolate' ";
      break;
    case 9:
      echo " class='cornflowerblue' ";
      break;
    case 10:
      echo " class='lime' ";
      break;
    case "X":
      echo " class='red' ";
      break;
    default:
      echo " class='lightgray' ";
      break;
  }
}

// FIXME: RIGHTMOST ROW IS BROKEN!!!
function click($board, $selection, $id)
{
  $x = floor($id / count($board[0]) + 1);
  $y = $id % count($board[0]);
  if ($board[$x - 1][$y - 1] == "\x58") {
    $total = count($selection);
    $selection = array_fill(0, $total, false);
  } else {
    $selection[$id - 1] = false;
  }

  echo "<br>id: {$id} x: {$x} y: {$y}";

  return $selection;
}
