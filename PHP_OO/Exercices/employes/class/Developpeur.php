<?php

require_once 'interfaces/EmployeInterface.php';

class Developpeur implements EmployeInterface
{
  public function travailler(): string
  {
    return 'Je code';
  }

  public function getSalaire(): float
  {
    return 2000;
  }

  public function __toString(): string
  {
    return $this->travailler() . ' pour ' . $this->getSalaire() . '€';
  }
}