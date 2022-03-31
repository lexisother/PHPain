<?php
$board = [];

// Generate the "X-Y coordinate" board structure.
for ($i = 0; $i < 7; $i++) {
  $board[$i] = [];
  for ($j = 0; $j < 10; $j++) {
    $board[$i][$j] = "";
  }
}
// Now, we can access the whole board using coordinates like $board[3][4] = "x"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
    table,
    td {
      border: 1px solid black;
      border-spacing: 0px;
    }

    td {
      width: 50px;
      height: 50px;
      font-size: xx-large;
      font-family: monospace;
      padding: 0px;
      text-align: center;
      background-color: lightgray;
    }

    td button {
      width: 50px;
      height: 47px;
    }

    <?php
    // TODO: Colour generation?
    // foreach ($colors as $c) {
    //   echo "." . $c . "{color:" . $c . ";}";
    // }
    ?>
  </style>
</head>

<body>
  <?php
  // Display the board and the coodinate contents in a table
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
  ?>
</body>

</html>
