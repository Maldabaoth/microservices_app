<?php
// models/Task.php

require_once '../config/db.php'; // Asegúrate de incluir la conexión a la base de datos

class Task {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function addTask($id_tarea, $materia, $fecha_entrega, $descripcion) {
        $query = "INSERT INTO tareas (id_tarea, materia, descripcion, fecha_entrega) VALUES (:id_tarea, :materia, :descripcion, :fecha_entrega)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_tarea', $id_tarea);
        $stmt->bindValue(':materia', $materia);
        $stmt->bindValue(':descripcion', $descripcion);
        $stmt->bindValue(':fecha_entrega', $fecha_entrega);
        $stmt->execute();
    }

    public function getAllTasks() {
        $query = "SELECT * FROM tareas";
        $stmt = $this->conn->query($query);

        // Verifica si la consulta devolvió resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTaskById($id_tarea) {
        $query = "SELECT * FROM tareas WHERE id_tarea = :id_tarea";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_tarea', $id_tarea);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTask($id_tarea, $materia, $fecha_entrega, $descripcion) {
        $query = "UPDATE tareas SET materia = :materia, fecha_entrega = :fecha_entrega, descripcion = :descripcion WHERE id_tarea = :id_tarea";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':materia', $materia);
        $stmt->bindValue(':fecha_entrega', $fecha_entrega);
        $stmt->bindValue(':descripcion', $descripcion);
        $stmt->bindValue(':id_tarea', $id_tarea);
        $stmt->execute();
    }

    public function deleteTask($id_tarea) {
        $query = "DELETE FROM tareas WHERE id_tarea = :id_tarea";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_tarea', $id_tarea);
        $stmt->execute();
    }
}
