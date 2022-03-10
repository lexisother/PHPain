<?php
# TODO TODO TODO: DOCUMENT AND REFACTOR!!!
# Initialize the session for caching data.
session_start();

if (isset($_GET['reset'])) {
  session_destroy();
  header("location:index.php");
}

$tekens = array("", "X", "O");
$vakjes = [];
$x = $tekens[1];
$o = $tekens[2];

# Initialize the session variables
if (isset($_SESSION['vakjes'])) {
  $vakjes = $_SESSION['vakjes'];
  $wie = $_SESSION['wie'];
} else {
  $vakjes = [];
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
    $vakjes[1] = $tekens[$teken];
  } elseif ($_GET['klik'] == 2) {
    $vakjes[2] = $tekens[$teken];
  } elseif ($_GET['klik'] == 3) {
    $vakjes[3] = $tekens[$teken];
  } elseif ($_GET['klik'] == 4) {
    $vakjes[4] = $tekens[$teken];
  } elseif ($_GET['klik'] == 5) {
    $vakjes[5] = $tekens[$teken];
  } elseif ($_GET['klik'] == 6) {
    $vakjes[6] = $tekens[$teken];
  } elseif ($_GET['klik'] == 7) {
    $vakjes[7] = $tekens[$teken];
  } elseif ($_GET['klik'] == 8) {
    $vakjes[8] = $tekens[$teken];
  } elseif ($_GET['klik'] == 9) {
    $vakjes[9] = $tekens[$teken];
  }
}

foreach (range(1, 9) as $i) {
  $_SESSION['vakjes'][$i] = $vakjes[$i];
}
foreach (range(1, 9) as $i) {
  $_SESSION["win$i"] = false;
}

$_SESSION['wie'] = !$wie;


// TODO: REFACTOR!!!
// So, you know, we were told to replace simple invocations such as multiple
// variable assignments with `foreach` blocks.
// But... here, we have three lines of assignments per `if` block. The
// `foreach` blocks are also three lines long.
// What I'm getting to is... replacing these with `foreach` blocks is
// pointless.

// X {{{
if ($vakjes[1] == $x && $vakjes[2] == $x && $vakjes[3] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win2'] = true;
  $_SESSION['win3'] = true;
} elseif ($vakjes[4] == $x && $vakjes[5] == $x && $vakjes[6] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win4'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win6'] = true;
} elseif ($vakjes[7] == $x && $vakjes[8] == $x && $vakjes[9] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win7'] = true;
  $_SESSION['win8'] = true;
  $_SESSION['win9'] = true;
}

if ($vakjes[1] == $x && $vakjes[4] == $x && $vakjes[7] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win4'] = true;
  $_SESSION['win7'] = true;
} elseif ($vakjes[2] == $x && $vakjes[5] == $x && $vakjes[8] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win2'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win8'] = true;
} elseif ($vakjes[3] == $x && $vakjes[6] == $x && $vakjes[9] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win3'] = true;
  $_SESSION['win6'] = true;
  $_SESSION['win9'] = true;
}

if ($vakjes[1] == $x && $vakjes[5] == $x && $vakjes[9] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win9'] = true;
} elseif ($vakjes[3] == $x && $vakjes[5] == $x && $vakjes[7] == $x) {
  $text = "x heeft gewonnen<br><br>";
  $_SESSION['win3'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win7'] = true;
}
// }}}

// O {{{
if ($vakjes[1] == $o && $vakjes[2] == $o && $vakjes[3] == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win2'] = true;
  $_SESSION['win3'] = true;
} elseif ($vakjes[4] == $o && $vakjes[5] == $o && $vakjes[6] == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win4'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win6'] = true;
} elseif ($vakjes[7] == $o && $vakjes[8] == $o && $vakjes[9] == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win7'] = true;
  $_SESSION['win8'] = true;
  $_SESSION['win9'] = true;
}

if ($vakjes[1] == $o && $vakjes[4] == $o && $vakjes[7] == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win4'] = true;
  $_SESSION['win7'] = true;
} elseif ($vakjes[2] == $o && $vakjes[5] == $o && $vakjes[8] == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win2'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win8'] = true;
} elseif ($vakjes[3] == $o && $vakjes[6] == $o && $vakjes[9] == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win3'] = true;
  $_SESSION['win6'] = true;
  $_SESSION['win9'] = true;
}

if ($vakjes[1] == $o && $vakjes[5] == $o && $vakjes[9] == $o) {
  $text = "o heeft gewonnen<br><br>";
  $_SESSION['win1'] = true;
  $_SESSION['win5'] = true;
  $_SESSION['win9'] = true;
} elseif ($vakjes[3] == $o && $vakjes[5] == $o && $vakjes[7] == $o) {
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
    <?php
    // Beware, ye who tread these lands, for they are decrepid.
    for ($i = 0; $i < 3; $i++) {
      echo "<tr>";
      for ($j = 1; $j <= 3; $j++) {
        $val = ($i * 3) + $j;
    ?>
        <td class="<?php if ($_SESSION["win$val"]) echo 'won'; ?>" onclick="window.location.href=`index.php?klik=<?php echo $val; ?>`;"><?php echo $vakjes[$val] ?></td>
    <?php
      }
      echo "</tr>";
    }
    ?>
  </table>

  <?php
  echo $text;
  ?>
  <p><a href="?reset=">Reset</a></p>
</body>

</html>
