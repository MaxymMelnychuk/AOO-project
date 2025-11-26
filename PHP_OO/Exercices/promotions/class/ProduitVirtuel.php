<?php

class ProduitVirtuel extends Produit
{
 private string $fichier;

 public function __construct(string $nom, float $prix, string $fichier)
 {
  parent::__construct($nom, $prix);
  $this->fichier = $fichier;
 }

 public function calculerPrixFinal(): float
 {
  return $this->prix;
 }
}
