<?php
require_once 'Personne.php';


class Etudiant extends Personne{
    protected $note;

    public function __construct($nom,$prenom,$age,$note){
        parent::__construct($nom,$prenom,$age);
        $this->note = $note;
    }

    public function getNote(){
        return $this->note;
    }
    public function setNote($note){
        $this->note = $note;
    }
}
?>