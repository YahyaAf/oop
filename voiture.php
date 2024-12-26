<?php
require_once 'src/Voiture.php';


$voiture1 = new Voiture('fiat','blanc');
echo $voiture1->setMarque("bmw");
echo $voiture1->getMarque();
?>