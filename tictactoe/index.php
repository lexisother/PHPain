<?php
# TODO TODO TODO: DOCUMENT AND REFACTOR!!!
# Initialize the session for caching data.
session_start();

if (isset($_GET['reset'])) {
  session_destroy();
  header("location:index.php");
}

$tekens = array("", "X", "O");
$x = $tekens[1];
$o = $tekens[2];

# Initialize the session variables
if (isset($_SESSION['vakjes'])) {
  $vakje1 = $_SESSION['vakjes'][1];
  $vakje2 = $_SESSION['vakjes'][2];
  $vakje3 = $_SESSION['vakjes'][3];
  $vakje4 = $_SESSION['vakjes'][4];
  $vakje5 = $_SESSION['vakjes'][5];
  $vakje6 = $_SESSION['vakjes'][6];
  $vakje7 = $_SESSION['vakjes'][7];
  $vakje8 = $_SESSION['vakjes'][8];
  $vakje9 = $_SESSION['vakjes'][9];
} else {
  $vakje1 = "";
  $vakje2 = "";
  $vakje3 = "";
  $vakje4 = "";
  $vakje5 = "";
  $vakje6 = "";
  $vakje7 = "";
  $vakje8 = "";
  $vakje9 = "";
}

if (isset($_GET['klik'])) {
  if ($_GET['klik'] == 1) {
    $vakje1 = $tekens[2];
  } elseif ($_GET['klik'] == 2) {
    $vakje2 = $tekens[2];
  } elseif ($_GET['klik'] == 3) {
    $vakje3 = $tekens[2];
  } elseif ($_GET['klik'] == 4) {
    $vakje4 = $tekens[2];
  } elseif ($_GET['klik'] == 5) {
    $vakje5 = $tekens[2];
  } elseif ($_GET['klik'] == 6) {
    $vakje6 = $tekens[2];
  } elseif ($_GET['klik'] == 7) {
    $vakje7 = $tekens[2];
  } elseif ($_GET['klik'] == 8) {
    $vakje8 = $tekens[2];
  } elseif ($_GET['klik'] == 9) {
    $vakje9 = $tekens[2];
  }
}

$_SESSION['vakjes'][1] = $vakje1;
$_SESSION['vakjes'][2] = $vakje2;
$_SESSION['vakjes'][3] = $vakje3;
$_SESSION['vakjes'][4] = $vakje4;
$_SESSION['vakjes'][5] = $vakje5;
$_SESSION['vakjes'][6] = $vakje6;
$_SESSION['vakjes'][7] = $vakje7;
$_SESSION['vakjes'][8] = $vakje8;
$_SESSION['vakjes'][9] = $vakje9;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style type="text/css">
    td {
      width: 50px;
      height: 50px;
      border: 1px solid black;
    }
  </style>
</head>

<body>
  <table>
    <tr>
      <td onclick="window.location.href=`index.php?klik=1`;"><?php echo $vakje1; ?></td>
      <td onclick="window.location.href=`index.php?klik=2`;"><?php echo $vakje2; ?></td>
      <td onclick="window.location.href=`index.php?klik=3`;"><?php echo $vakje3; ?></td>
    </tr>
    <tr>
      <td onclick="window.location.href=`index.php?klik=4`;"><?php echo $vakje4; ?></td>
      <td onclick="window.location.href=`index.php?klik=5`;"><?php echo $vakje5; ?></td>
      <td onclick="window.location.href=`index.php?klik=6`;"><?php echo $vakje6; ?></td>
    </tr>
    <tr>
      <td onclick="window.location.href=`index.php?klik=7`;"><?php echo $vakje7; ?></td>
      <td onclick="window.location.href=`index.php?klik=8`;"><?php echo $vakje8; ?></td>
      <td onclick="window.location.href=`index.php?klik=9`;"><?php echo $vakje9; ?></td>
    </tr>
  </table>

  <?php
  // TODO: REFACTOR!!!

  // X {{{
  if ($vakje1 == $x && $vakje2 == $x && $vakje3 == $x) {
    echo "x heeft gewonnen<br><br>";
  } elseif ($vakje4 == $x && $vakje5 == $x && $vakje6 == $x) {
    echo "x heeft gewonnen<br><br>";
  } elseif ($vakje7 == $x && $vakje8 == $x && $vakje9 == $x) {
    echo "x heeft gewonnen<br><br>";
  }

  if ($vakje1 == $x && $vakje4 == $x && $vakje7 == $x) {
    echo "x heeft gewonnen<br><br>";
  } elseif ($vakje2 == $x && $vakje5 == $x && $vakje8 == $x) {
    echo "x heeft gewonnen<br><br>";
  } elseif ($vakje3 == $x && $vakje6 == $x && $vakje9 == $x) {
    echo "x heeft gewonnen<br><br>";
  }

  if ($vakje1 == $x && $vakje5 == $x && $vakje9 == $x) {
    echo "x heeft gewonnen<br><br>";
  } elseif ($vakje3 == $x && $vakje5 == $x && $vakje7 == $x) {
    echo "x heeft gewonnen<br><br>";
  }
  // }}}

  // O {{{
  if ($vakje1 == $o && $vakje2 == $o && $vakje3 == $o) {
    echo "o heeft gewonnen<br><br>";
  } elseif ($vakje4 == $o && $vakje5 == $o && $vakje6 == $o) {
    echo "o heeft gewonnen<br><br>";
  } elseif ($vakje7 == $o && $vakje8 == $o && $vakje9 == $o) {
    echo "o heeft gewonnen<br><br>";
  }

  if ($vakje1 == $o && $vakje4 == $o && $vakje7 == $o) {
    echo "o heeft gewonnen<br><br>";
  } elseif ($vakje2 == $o && $vakje5 == $o && $vakje8 == $o) {
    echo "o heeft gewonnen<br><br>";
  } elseif ($vakje3 == $o && $vakje6 == $o && $vakje9 == $o) {
    echo "o heeft gewonnen<br><br>";
  }

  if ($vakje1 == $o && $vakje5 == $o && $vakje9 == $o) {
    echo "o heeft gewonnen<br><br>";
  } elseif ($vakje3 == $o && $vakje5 == $o && $vakje7 == $o) {
    echo "o heeft gewonnen<br><br>";
  }
  // }}}
  ?>
  <p><a href="?reset=">Reset</a></p>
</body>

</html>
