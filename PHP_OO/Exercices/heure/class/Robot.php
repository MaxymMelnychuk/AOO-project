<?php

require_once './trait/HorlogeTrait.php';

class Robot {
  use HorlogeTrait;

  public function __toString(): string
  {
    return $this->afficherHeure(__CLASS__);
  }
}