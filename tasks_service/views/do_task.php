<?php
// do_task.php

session_start();
if ($_SESSION['role'] !== 'estudiante') {
    header("Location: unauthorized.php");
    exit;
}

require_once '../config/db.php';
require_once '../models/Tracking.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tarea = $_POST['id_tarea'];
    $id_estudiante = $_SESSION['id']; // Suponiendo que el ID del estudiante está en la sesión
    $estado = $_POST['estado'];
    $opinion = $_POST['opinion'];
    $dificultad = $_POST['dificultad'];

    $tracking = new Tracking();
    $tracking->addFeedback($id_tarea, $id_estudiante, $estado, $opinion, $dificultad);

    header("Location: student_home.php");
    exit;
}

$id_tarea = $_GET['id'];
?>

<h1>Realizar Tarea</h1>

<form method="POST" action="do_task.php">
    <input type="hidden" name="id_tarea" value="<?php echo $id_tarea; ?>">
    Estado: <input type="text" name="estado" required><br>
    Opinión: <textarea name="opinion" required></textarea><br>
    Dificultad (1-5): <input type="number" name="dificultad" min="1" max="5" required><br>
    <input type="submit" value="Enviar Feedback">
</form>
