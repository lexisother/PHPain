<?php
session_start();
if (isset($_GET['reset'])) {
  session_destroy();
  header("location:index.php");
}
include_once("les_6_functies.php");

if (isset($_GET['click'])) {
  $selection = click($board, $selection, $_GET['click']);
}
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
    $colors = [
      'blue',
      'green',
      'yellow',
      'purple',
      'orange',
      'magenta',
      'pink',
      'chocolate',
      'cornflowerblue',
      'lime',
      'lightgray',
      'red',
    ];
    foreach ($colors as $c) {
      echo "." . $c . "{color:" . $c . ";}";
    }
    ?>
  </style>
</head>

<body>
  <?php
  // Display the board and the coodinate contents in a table
  showBoard($board, $selection);
  ?>
  <a href="?reset=">Reset</a>
</body>

</html>

<?php
$_SESSION['game'] = $board;
$_SESSION['selection'] = $selection;
?>
