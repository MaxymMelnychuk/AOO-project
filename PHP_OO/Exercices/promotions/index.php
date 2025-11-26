<?php

require_once "trait/HistoriquePrix.php";
require_once "interface/Promotion.php";
require_once "class/Produit.php";
require_once "class/ProduitPhysique.php";
require_once "class/ProduitVirtuel.php";
require_once "class/ReductionFixe.php";
require_once "class/ReductionPourcentage.php";

$produit1 = new ProduitPhysique("Produit 1", 100, 1, 10);
$produit2 = new ProduitVirtuel("Produit 2", 200, "fichier.pdf");

$promo_fixe = new ReductionFixe(50);
$promo_pourcentage = new ReductionPourcentage(50);

$produit1->setPromotion($promo_fixe);
$produit2->setPromotion($promo_pourcentage);

echo '<p>Historique prix produit 1 : ' . $produit1->afficherHistorique() . '</p>';
echo '<p>Historique prix produit 2 : ' . $produit2->afficherHistorique() . '</p>';
