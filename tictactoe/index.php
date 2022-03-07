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
  $wie = $_SESSION['wie'];
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
  $wie = true;
}

$text = "";

if (isset($_GET['klik'])) {
  if ($wie) {
    $teken = 1;
  } else {
    $teken = 2;
  }
  if ($_GET['klik'] == 1) {
    $vakje1 = $tekens[$teken];
  } elseif ($_GET['klik'] == 2) {
    $vakje2 = $tekens[$teken];
  } elseif ($_GET['klik'] == 3) {
    $vakje3 = $tekens[$teken];
  } elseif ($_GET['klik'] == 4) {
    $vakje4 = $tekens[$teken];
  } elseif ($_GET['klik'] == 5) {
    $vakje5 = $tekens[$teken];
  } elseif ($_GET['klik'] == 6) {
    $vakje6 = $tekens[$teken];
  } elseif ($_GET['klik'] == 7) {
    $vakje7 = $tekens[$teken];
  } elseif ($_GET['klik'] == 8) {
    $vakje8 = $tekens[$teken];
  } elseif ($_GET['klik'] == 9) {
    $vakje9 = $tekens[$teken];
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
$_SESSION['wie'] = !$wie;
$_SESSION['win1'] = false;
$_SESSION['win2'] = false;
$_SESSION['win3'] = false;
$_SESSION['win4'] = false;
$_SESSION['win5'] = false;
$_SESSION['win6'] = false;
$_SESSION['win7'] = false;
$_SESSION['win8'] = false;
$_SESSION['win9'] = false;


// TODO: REFACTOR!!!

// X {{{
if ($vakje1 == $x && $vakje2 == $x && $vakje3 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win2'] = true;
  $_SESSION['win3'] = true;
} elseif ($vakje4 == $x && $vakje5 == $x && $vakje6 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win4'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win6'] = true;
} elseif ($vakje7 == $x && $vakje8 == $x && $vakje9 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win7'] = true;
  $_SESSION['win8'] = true;
  $_SESSION['win9'] = true;
}

if ($vakje1 == $x && $vakje4 == $x && $vakje7 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win4'] = true;
  $_SESSION['win7'] = true;
} elseif ($vakje2 == $x && $vakje5 == $x && $vakje8 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win2'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win8'] = true;
} elseif ($vakje3 == $x && $vakje6 == $x && $vakje9 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win3'] = true;
  $_SESSION['win6'] = true;
  $_SESSION['win9'] = true;
}

if ($vakje1 == $x && $vakje5 == $x && $vakje9 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win9'] = true;
} elseif ($vakje3 == $x && $vakje5 == $x && $vakje7 == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win3'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win7'] = true;
}
// }}}

// O {{{
if ($vakje1 == $o && $vakje2 == $o && $vakje3 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win2'] = true;
  $_SESSION['win3'] = true;
} elseif ($vakje4 == $o && $vakje5 == $o && $vakje6 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win4'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win6'] = true;
} elseif ($vakje7 == $o && $vakje8 == $o && $vakje9 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win7'] = true;
  $_SESSION['win8'] = true;
  $_SESSION['win9'] = true;
}

if ($vakje1 == $o && $vakje4 == $o && $vakje7 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win4'] = true;
  $_SESSION['win7'] = true;
} elseif ($vakje2 == $o && $vakje5 == $o && $vakje8 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win2'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win8'] = true;
} elseif ($vakje3 == $o && $vakje6 == $o && $vakje9 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win3'] = true;
  $_SESSION['win6'] = true;
  $_SESSION['win9'] = true;
}

if ($vakje1 == $o && $vakje5 == $o && $vakje9 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win9'] = true;
} elseif ($vakje3 == $o && $vakje5 == $o && $vakje7 == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win3'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win7'] = true;
}
// }}}

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

    .won {
      background-color: green;
    }
  </style>
</head>

<body>
  <!-- I purposefully didn't implement prevention of re-choosing an already chosen square. -->
  <!-- So, as it goes... TODO: PREVENT USER FROM RE-CHOOSING CHOSEN SQUARE -->
  <table>
    <tr>
      <td class="<?php if ($_SESSION['win1']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=1`;"><?php echo $vakje1; ?></td>
      <td class="<?php if ($_SESSION['win2']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=2`;"><?php echo $vakje2; ?></td>
      <td class="<?php if ($_SESSION['win3']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=3`;"><?php echo $vakje3; ?></td>
    </tr>
    <tr>
      <td class="<?php if ($_SESSION['win4']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=4`;"><?php echo $vakje4; ?></td>
      <td class="<?php if ($_SESSION['win5']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=5`;"><?php echo $vakje5; ?></td>
      <td class="<?php if ($_SESSION['win6']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=6`;"><?php echo $vakje6; ?></td>
    </tr>
    <tr>
      <td class="<?php if ($_SESSION['win7']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=7`;"><?php echo $vakje7; ?></td>
      <td class="<?php if ($_SESSION['win8']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=8`;"><?php echo $vakje8; ?></td>
      <td class="<?php if ($_SESSION['win9']) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=9`;"><?php echo $vakje9; ?></td>
    </tr>
  </table>

  <?php
  echo $text;
  ?>
  <p><a href="?reset=">Reset</a></p>
</body>

</html>
