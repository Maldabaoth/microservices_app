<?php
// models/Profesor.php

require_once '../config/db.php';

class Profesor {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getProfesorById($id_profesor) {
        $query = "SELECT * FROM Profesor WHERE ID_Profesor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_profesor);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}