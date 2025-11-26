<?php

abstract class Produit
{

 use HistoriquePrix;
 private string $nom;
 protected float $prix;

 public function __construct(string $nom, float $prix)
 {
  $this->nom = $nom;
  $this->prix = $prix;

  $this->ajouterHistorique($prix);
 }

 abstract public function calculerPrixFinal(): float;

 public function setPromotion(Promotion $promotion): void
 {
  $nouveau_prix = $promotion->appliquerPromotion($this->calculerPrixFinal());

  $this->ajouterHistorique($nouveau_prix);

  $this->prix = $nouveau_prix;
 }
}
