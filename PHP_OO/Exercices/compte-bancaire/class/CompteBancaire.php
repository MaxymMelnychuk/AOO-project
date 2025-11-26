<?php
class CompteBancaire {
  private float $solde;
  private string $titulaire;

  public function __construct(
    string $titulaire
  ){
    $this->setTitulaire($titulaire);
    $this->setSolde(0);
  }

  public function getTitulaire(): string
  {
    return $this->titulaire;
  }
  public function setTitulaire(string $nom): self
  {
    $this->titulaire = $nom;
    return $this;
  }

  public function getSolde(): float
  {
    return $this->solde;
  }
  public function setSolde(float $montant): self
  {
    $this->solde = $montant;
    return $this;
  }

  public function crediter(float $montant): self
  {
    $this->solde += $montant;
    return $this;
  }

  public function debiter(float $montant): self
  {
    $this->solde -= $montant;
    return $this;
  }
}