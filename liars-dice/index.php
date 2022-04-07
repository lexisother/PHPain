<?php
include_once("les_6_functies.php");

$editedBoard = placeBomb($board, 10);
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
  showBoard($editedBoard);
  ?>
</body>

</html>
