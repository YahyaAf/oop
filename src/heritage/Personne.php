<?php
class Personne{
    protected $nom;
    protected $prenom;
    protected $age;

    public function __construct($prenom,$nom,$age){
        $this->nom =$nom ;
        $this->prenom =$prenom ;
        $this->age =$age  ;
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getAge(){
        return $this->age;
    }
    public function setAge($nom){
        $this->age = $age;
    }
}

 
?>