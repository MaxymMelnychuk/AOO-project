<?php

class ProduitPhysique extends Produit
{
 private float $poids;
 private float $frais_livraison;

 public function __construct(string $nom, float $prix, float $poids, float $frais_livraison)
 {
  parent::__construct($nom, $prix);
  $this->poids = $poids;
  $this->frais_livraison = $frais_livraison;
 }

 public function calculerPrixFinal(): float
 {
  return $this->prix + $this->frais_livraison;
 }
}
