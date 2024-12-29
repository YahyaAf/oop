<?php
require_once 'DivisionTrait.php';
require_once 'AdditionTrait.php';

class Calcul {
    use DivisionTrait;
    use AdditionTrait;
}


$calcul = new Calcul();
echo $calcul->Division(5,5);
echo "<br>";
echo $calcul->Addition(5,5);
?>