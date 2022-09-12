<?php

ini_set('display_errors', 1);

/**
 * Pen that writes.
 * @author Alyxia
 */
class Pen
{
  public $kleur;
  public $dop;

  private $inhoud;

  /**
   * Creates a new pen instance.
   *
   * @param string $kleur
   * @return void
   */
  public function __construct(string $kleur)
  {
    $this->kleur = $kleur;
    $this->dop = false;
    $this->inhoud = 100;
  }

  private function vloeien($inkt)
  {
    $aantal = strlen($inkt);
    if ($this->inhoud > $aantal) {
      $this->inhoud -= $aantal;
      echo $inkt;
    }
  }

  public function schrijf($iets)
  {
    if ($this->dop) {
      $output = "<p>{$iets}</p>";
      $this->vloeien($output);
    }
    // // Make sure a pen with a cap fails to write.
    // if ($this->dop) {
    //   throw new Exception("I can't write, there is a cap on me!");
    // }
    // echo "<p><span style='color: {$this->kleur};'>{$iets}</span></p>";
  }
}

// $rodePen = new Pen("#ff0000", false);
// $groenePen = new Pen("#00ff00", false);
// $blauwePen = new Pen("#0000ff", false);
//
// $rodePen->schrijf("hoi rood");
// $groenePen->schrijf("hoi groen");
// $blauwePen->schrijf("hoi blauw");

$markerA = new Pen("#ff0000");
$markerB = new Pen("#00ff00");
$markerA->dop = true;
$markerB->dop = true;

$markerA->schrijf("hoi dsajdksajkdhashdsakjdhskdhkasjdhsahjkdsa adjkshdsajkdhsadhkajshdashdsjkjkdahsjkdhaskjhsakjdhsahdkjas");
$markerB->schrijf("hoi");
