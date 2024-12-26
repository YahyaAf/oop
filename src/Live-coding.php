<?php

class Voiture{
    private $matricule;
    private $couleur ;
    private $modele;
    private $annee;

    // constructeur du classe
    public function __construct($mtr, $clr,$modele,$annee){
        $this->setMatricule($mtr);
        $this->setCouleur($clr);
        $this->setModele($modele);
        $this->setAnnee($annee);
        echo'its working';
    }
    // getters and setters
    public function getMatricule(){
        return $this->matricule;
    }
    public function setMatricule($mtr){
        if(strlen($mtr)<=7){
            $this->matricule = $mtr;
        }
        else{
            echo 'matricule invalide';
        }
        
    }
    public function getCouleur(){
        return $this->couleur;
    }
    public function setCouleur($color){
        if(!is_numeric($color)){
            $this->couleur = $color;
        }
        else{
            throw new InvalidArgumentException('it should not be a number');
        }
        
    }
    public function getModele(){
        return $this->modele;
    }
    public function setModele($modele){
        if(strlen($modele)>5){
            $this->modele = $modele;
        }
        else{
            throw new InvalidArgumentException('it should be at least 5 letters');
        }
    }
    public function getAnnee(){
        return $this->annee;
    }
    public function setAnnee($annee){
        if(is_numeric($annee)&& !empty($annee)){
            $this->annee = $annee;
        }
        else{
            throw new InvalidArgumentException('it should be a number');
        }
    }


}
 try {
    $mercedes = new Voiture('B5555','black','mercedes',"sss");
    $mercedes -> getAnnee();
 } catch (Exception $e) {
    echo 'eroro find' .$e -> getMessage();
 }


?>