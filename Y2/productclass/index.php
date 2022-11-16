<?php
ini_set('display_errors', 1);

function debug($iets)
{
  echo "<pre>";
  print_r($iets);
  echo "</pre>";
}

include_once 'connect.php';
include_once 'product.php';

$prod = new Product();
$res = $prod->readOne('S10_1678');

debug($res);
