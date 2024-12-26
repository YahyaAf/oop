<?php
require_once 'src/abstrate/Forme.php';
require_once 'src/abstrate/Rectangle.php';
require_once 'src/abstrate/Cercle.php';


$rectangle = new Rectangle(7,8);
echo $rectangle->Surface();
echo'<br>';
$cercle = new Cercle(7);
echo $cercle->Surface();
?>