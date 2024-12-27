<?php

class Player {
    private $conn;
    private $table_name;

    // Object properties (these can vary based on table structure)
    public $id;
    public $fields = [];

    public function __construct($db, $table_name) {
        $this->conn = $db;
        $this->table_name = $table_name;
    }

    // Create a new record
    public function create() {
        $field_names = implode(", ", array_keys($this->fields));
        $placeholders = ":" . implode(", :", array_keys($this->fields));

        $query = "INSERT INTO " . $this->table_name . " ($field_names) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($query);

        foreach ($this->fields as $key => $value) {
            $stmt->bindParam(":$key", $this->fields[$key]);
        }

        return $stmt->execute();
    }

    // Read all records
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Delete a record by ID
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Update a record by ID
    public function update() {
        $set_clause = [];
        foreach ($this->fields as $key => $value) {
            $set_clause[] = "$key = :$key";
        }
        $set_clause_str = implode(", ", $set_clause);

        $query = "UPDATE " . $this->table_name . " SET $set_clause_str WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        foreach ($this->fields as $key => $value) {
            $stmt->bindParam(":$key", $this->fields[$key]);
        }
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Read one record by ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
