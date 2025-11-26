<?php

class ReductionFixe implements Promotion
{
 private float $montant;

 public function __construct(float $montant)
 {
  $this->montant = $montant;
 }

 public function appliquerPromotion(float $prix): float
 {
  return $prix - $this->montant;
 }
}
