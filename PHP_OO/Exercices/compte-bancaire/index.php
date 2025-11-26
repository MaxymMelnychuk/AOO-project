<?php

require_once './class/CompteBancaire.php';

$compte = new CompteBancaire('John Doe');
echo '<p>' . $compte->getTitulaire() . ' : ' . $compte->getSolde() . '€</p>';
$compte->crediter(100);
echo '<p>+100€ : ' . $compte->getSolde() . '€</p>';
$compte->debiter(50);
echo '<p>-50€ : ' . $compte->getSolde() . '€</p>';


$compte2 = new CompteBancaire('Jane Doe');
echo '<p>' . $compte2->getTitulaire() . ' : ' . $compte2->getSolde() . '€</p>';
$compte2->crediter(2000);
echo '<p>+2000€ : ' . $compte2->getSolde() . '€</p>';
$compte2->debiter(5000);
echo '<p>-5000€ : ' . $compte2->getSolde() . '€</p>';