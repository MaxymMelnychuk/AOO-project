<?php

class ReductionPourcentage implements Promotion
{
 private float $pourcentage;

 public function __construct(float $pourcentage)
 {
  $this->pourcentage = $pourcentage;
 }

 public function appliquerPromotion(float $prix): float
 {
  return $prix - ($prix * $this->pourcentage / 100);
 }
}
