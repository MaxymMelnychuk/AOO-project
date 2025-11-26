<?php

class Entreprise
{
  private array $employes;
  private string $masseSalariale;

  public function __construct()
  {
    $this->employes = [];
    $this->masseSalariale = 0;
  }

  public function ajoutEmploye(Developpeur | Designer $employe): self
  {
    $this->employes[] = $employe;
    return $this;
  }

  public function getMasseSalariale(): float
  {
    foreach ($this->employes as $employe) {
      $this->masseSalariale += $employe->getSalaire();
    }
    return $this->masseSalariale;
  }
}