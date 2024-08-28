<?php
// add_task.php

session_start();
if ($_SESSION['role'] !== 'profesor') {
    header("Location: unauthorized.php");
    exit;
}

require_once '../config/db.php';
require_once '../models/Task.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tarea = $_POST['id_tarea'];
    $materia = $_POST['materia'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $descripcion = $_POST['descripcion'];

    $task = new Task();
    $task->addTask($id_tarea, $materia, $fecha_entrega, $descripcion);

    header("Location: list_tasks.php");
}

?>

<form method="POST" action="add_task.php">
    ID Tarea: <input type="text" name="id_tarea" required><br>
    Materia: <input type="text" name="materia" required><br>
    Fecha de Entrega: <input type="date" name="fecha_entrega" required><br>
    Descripción: <input type="text" name="descripcion" required><br>
    <input type="submit" value="Agregar Tarea">
</form>
