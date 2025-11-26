<?php
// Import de la class Produit
require_once './class/Produit.php';
require_once './class/ProduitPhysique.php';
 
// Création d'un objet 'livre' de type 'Produit'
$livre1 = new Produit('Nom du livre', null, 100, 10);

$livre2 = new Produit('Nom du livre 2', null, 200, 20);

echo '<p>' . $livre1->getNom() . ' vaut ' . $livre1->getPrix() . '€ HT, soit ' . $livre1->getPrixTTC() . '€ TTC (' . $livre1->getMontantTVA() . '€ TVA)</p>';
echo '<p>' . $livre2->getNom() . ' vaut ' . $livre2->getPrix() . '€ HT, soit ' . $livre2->getPrixTTC() . '€ TTC (' . $livre2->getMontantTVA() . '€ TVA)</p>';

$chaise = new ProduitPhysique('Chaise', null, 30, 20, 10);
echo $chaise;

$serialized = serialize($chaise);
echo $serialized;

$unserialized = unserialize($serialized);
echo $unserialized; // Appel indirect de __toString()