<?php
// Modelo Tracking.php
require_once '../config/db.php';

class Tracking {
    private $db;

    public function __construct() {
        $this->db = connect();
    }

    // Aquí irán las funciones para manejar el seguimiento de tareas
    public function getAllTrackings() {
        $query = "SELECT * FROM seguimiento_tareas";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // Dentro de la clase Tracking

    public function addFeedback($id_tarea, $id_estudiante, $estado, $opinion, $dificultad) {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO seguimiento_tareas (ID_Tarea, ID_Estudiante, Estado, Opinion, Dificultad) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissi", $id_tarea, $id_estudiante, $estado, $opinion, $dificultad);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}


}
?>
