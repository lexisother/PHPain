<?php
// Please for the love of God, do not rate my programming ability with this piece of code.
// I am truly ashamed I was forced to do this. Writing every token in this file has made me feel like I was committing a sin.
// You see, I was actually telling my classmate every other possible way to do this while writing it.

// This is used for tracking the user's correct answers..
$ans1 = $_POST['ans1'] ?? '_';
$ans2 = $_POST['ans2'] ?? '_';
$ans3 = $_POST['ans3'] ?? '_';
$ans4 = $_POST['ans4'] ?? '_';
$ans5 = $_POST['ans5'] ?? '_';

// This is used for tracking the correct answers.
$woord1 = "p";
$woord2 = "a";
$woord3 = "a";
$woord4 = "r";
$woord5 = "d";

// This is used for tracking how many times the user has guessed.
$gekozen = "";

if (isset($_POST['gok'])) {
  if ($_POST['gok'] == $woord1) {
    $ans1 = $woord1;
  }
  if ($_POST['gok'] == $woord2) {
    $ans2 = $woord2;
  }
  if ($_POST['gok'] == $woord3) {
    $ans3 = $woord3;
  }
  if ($_POST['gok'] == $woord4) {
    $ans4 = $woord4;
  }
  if ($_POST['gok'] == $woord5) {
    $ans5 = $woord5;
  }

  $gekozen = $_POST['gekozen'] . $_POST['gok'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galgje</title>
</head>

<body>
  <br />
  <?php echo $ans1 . " " . $ans2 . " " . $ans3 . " " . $ans4 . " " . $ans5 ?>
  <br />
  <form action="index.php" method="post">
    <input type="text" name="gok" maxlength="1" />
    <input type="hidden" name="gekozen" value="<?php echo $gekozen ?>" />
    <input type="hidden" name="ans1" value="<?php echo $ans1 ?>" />
    <input type="hidden" name="ans2" value="<?php echo $ans2 ?>" />
    <input type="hidden" name="ans3" value="<?php echo $ans3 ?>" />
    <input type="hidden" name="ans4" value="<?php echo $ans4 ?>" />
    <input type="hidden" name="ans5" value="<?php echo $ans5 ?>" />
    <input type="submit" />
  </form>

  <p>Je hebt <?php echo strlen($gekozen)  ?> keer gegokt</p>
</body>

</html>
