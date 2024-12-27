<?php

class Player {
    private $conn;
    private $table_name = "players";

    public $id;
    public $name;
    public $club;
    public $nationality;
    public $rating;
    public $position;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un joueur
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, club=:club, nationality=:nationality, rating=:rating, position=:position";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":club", $this->club);
        $stmt->bindParam(":nationality", $this->nationality);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":position", $this->position);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Récupérer tous les joueurs
    public function read() {
        $query = "SELECT id, name, club, nationality, rating, position FROM " . $this->table_name;
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Supprimer un joueur
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    
    // Mettre à jour un joueur
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, club = :club, nationality = :nationality, rating = :rating, position = :position WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":club", $this->club);
        $stmt->bindParam(":nationality", $this->nationality);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":position", $this->position);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

?>
