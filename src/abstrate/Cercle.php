<?php
require_once 'Forme.php';

class Cercle extends Forme{
    protected $rayon;

    public function __construct($rayon){
        $this->rayon=$rayon;
    }

    public function Surface(){
        return $this->rayon * $this->rayon * pi();
    }

}
?>