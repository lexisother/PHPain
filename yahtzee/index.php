<?php
$trackingNums = [];

$dicenums = [];
for ($i = 0; $i < 5; $i++) {
  $dicenums[$i] = rand(1, 6);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
    dice {
      width: 100px;
      height: 100px;
    }

    /* https://stackoverflow.com/a/22285653 {{{ */
    /* https://creativecommons.org/licenses/by-sa/3.0/ */
    table {
      width: 100%;
    }

    table,
    td {
      border: solid black 1px;
    }

    table.counter {
      width: auto;
      margin-right: 0px;
      margin-left: auto;
    }

    /* }}} */
  </style>
</head>

<body>
  <?php
  // dobbelstenen weergeven
  foreach ($dicenums as $dice) {
    echo "<dice class='dot{$dice}'></dice>";
  }
  echo "<br />";

  if (count(array_unique($dicenums)) === 1) {
    echo "Yahtzee!";
  }

  for ($i = 0; $i < 5; $i++) {
    for ($j = 1; $j <= 6; $j++) {
      if ($dicenums[$i] == $j) {
        $trackingNums[$j]++;
      }
    }
  }
  ?>
  <table class="counter">
    <tr>
      <th>Number</th>
      <th>Amount</th>
    </tr>
    <tr>
      <?php
      foreach ($trackingNums as $key => $val) {
        echo "<tr>";
        echo "<td>{$key}</td>";
        echo "<td>{$val}</td>";
        echo "</tr>";
      }
      ?>
    </tr>
  </table>

  <script src="dice.js"></script>
</body>

</html>
