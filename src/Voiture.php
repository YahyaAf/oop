<?php
class Voiture{
    //attribut
    private $marque;
    private $couleur;

    //les methodes 
    public function __construct($marque,$couleur){
        $this->marque = $marque;
        $this->couleur = $couleur;
    }
    public function __toString(){
        return "Voiture : ".$this->marque." Et coleur : ".$this->marque;
    }

    // encapsulation
    public function getMarque(){
        return $this->marque;
    }
    public function getCouleur(){
        return $this->couleur;
    }

    public function setMarque($marque){
        $this->marque = $marque;
    }
    public function setColeur($couleur){
        $this->couleur = $couleur;
    }


}
?>