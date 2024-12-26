<?php
class Cercle{
    // attribut d'instance ou attrubut d'objet parce ce il est change : $this
    private $rayon;
    // attribut de class : static
    // private static $pi = 3.14;
    const pi = 3.14;

    public function __construct($rayon){
        $this->rayon = $rayon;
    }

    public function getRayon(){
        return $this->rayon;
    }

    public function setRayon($rayon){
        $this->rayon=$rayon;
    }


    // calcule la surface de cercle
    public function surface(){
        $surface = static::pi * $this->rayon * $this->rayon;
        return "La surface de cette cercle est : ".$surface;
    }
}
?>