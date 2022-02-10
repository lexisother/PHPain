<?php
// So, you see, the error handling is commented out because, yanno, these
// checks will always pass on the first visit.
// The reason is that before you actually enter any numbers, there's no data in
// `$_POST`, so the checks pass and the exceptions are thrown.
// But, well, nothing actually "errors" without this handling (on my machine!),
// so I'm commenting it out.
// if (!isset($_POST['firstnum'])) throw new Exception('First number is not set');
// if (!isset($_POST['secondnum'])) throw new Exception('Second number is not set');

$firstnum = $_POST['firstnum'];
$secondnum = $_POST['secondnum'];
$operator = $_POST['operator'];
$res = '';

if (is_numeric($firstnum) && is_numeric($secondnum)) {
  switch ($operator) {
    case "+":
      $res = $firstnum + $secondnum;
      break;

      // Given the exercise is to make a simple addition, we are removing
      // support for all other operators.
      // Why? In spite, of course!
      // {{{
      // case "-":
      //   $res = $firstnum - $secondnum;
      //   break;
      // case "*":
      //   $res = $firstnum * $secondnum;
      //   break;
      // case "/":
      //   $res = $firstnum / $secondnum;
      //   }}}
  }
}
?>

<body>
  <form action="" method="post" id="quiz-form">
    <input type="number" name="firstnum" id="firstnum" required="required" value="<?php echo $firstnum; ?>" />

    <select name="operator">
      <option value="+">+</option>
      <!-- Refer to the comment in the switch statement for the reasoning behind this comment. -->
      <!-- <option value="-">-</option> -->
      <!-- <option value="*">*</option> -->
      <!-- <option value="/">/</option> -->
    </select>

    <input type="number" name="secondnum" id="secondnum" required="required" value="<?php echo $secondnum; ?>" />

    = <?php echo $res; ?>

    <br />
    <input type="submit" />
  </form>
</body>
