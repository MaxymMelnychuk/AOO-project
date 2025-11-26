<?php

trait HistoriquePrix
{
 private array $historique_prix = [];

 public function ajouterHistorique(float $prix)
 {
  $this->historique_prix[] = $prix;
 }

 public function afficherHistorique(): string
 {
  return join(", ", $this->historique_prix);
 }
}
