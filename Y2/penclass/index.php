<?php

ini_set('display_errors', 1);

class Pen
{
  public $kleur;
  public $dop;
  // private $inhoud;

  public function __construct(string $kleur, bool $dop)
  {
    $this->kleur = $kleur;
    $this->dop = $dop;
  }

  public function vliegen($var)
  {
    // NOOP
  }

  private function vloeien()
  {
    // NOOP
  }

  public function schrijf($iets)
  {
    // Make sure a pen with a cap fails to write.
    if ($this->dop) {
      throw new Exception("I can't write, there is a cap on me!");
    }
    echo "<p><span style='color: {$this->kleur};'>{$iets}</span></p>";
  }
}

$rodePen = new Pen("#ff0000", false);
$groenePen = new Pen("#00ff00", false);
$blauwePen = new Pen("#0000ff", false);

$rodePen->schrijf("hoi rood");
$groenePen->schrijf("hoi groen");
$blauwePen->schrijf("hoi blauw");
