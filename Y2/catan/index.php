<?php

ini_set("display_errors", 1);

include_once "board.php";

function debug($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}

$a = new Board();

debug($a);
