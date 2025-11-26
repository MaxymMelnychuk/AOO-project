<?php

require_once 'interfaces/EmployeInterface.php';

class Designer implements EmployeInterface
{
    public function travailler(): string
    {
        return 'Je dessine';
    }

    public function getSalaire(): float
    {
        return 1500;
    }

    public function __toString(): string
  {
    return $this->travailler() . ' pour ' . $this->getSalaire() . '€';
  }
}