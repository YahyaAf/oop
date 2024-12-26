<?php
require_once 'src/heritage/Etudiant.php';
require_once 'src/heritage/Salarie.php';
require_once 'src/heritage/Directeur.php';

// $etudiante1 = new Etudiant('afadisse','yahya',18,15);
// echo $etudiante1->getNote();

$farid = new Directeur('farid','faridi',18,25000,"directeur");
echo $farid->getPrime();

echo "<br>";

$walid = new Salarie('walid','walidi',18,8500,"stagiaire");
echo $walid->getPrime();

echo "<br>";
echo $farid->Total();

echo "<br>";

echo $walid->Total();

// $personne = new Personne('walid','walidi',18);
// echo $personne->getNom();
?>