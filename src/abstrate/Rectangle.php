<?php
require_once 'Forme.php';

class Rectangle extends Forme{
    protected $hauteur;
    protected $largeur;

    public function __construct($hauteur,$largeur){
        $this->hauteur=$hauteur;
        $this->largeur=$largeur;
    }

    public function Surface(){
        return $this->hauteur * $this->largeur ;
    }

}
?>