<?php

require_once 'class/Developpeur.php';
require_once 'class/Designer.php';
require_once 'class/Entreprise.php';

$developpeur = new Developpeur();
$designer = new Designer();

echo '<p>'.$developpeur.'</p>';
echo '<p>'.$designer.'</p>';

$entreprise = new Entreprise();
$entreprise->ajoutEmploye($developpeur);
$entreprise->ajoutEmploye($designer);
echo '<p>Masse salariale : '.$entreprise->getMasseSalariale().'€</p>';

