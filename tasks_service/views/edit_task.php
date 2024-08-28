<?php
// edit_task.php

session_start();
if ($_SESSION['role'] !== 'profesor') {
    header("Location: unauthorized.php");
    exit;
}

require_once '../config/db.php';
require_once '../models/Task.php';

$task = new Task();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tarea = $_POST['ID_Tarea'];
    $materia = $_POST['Materia'];
    $fecha_entrega = $_POST['Fecha_Entrega'];
    $descripcion = $_POST['Descripcion'];

    $task->updateTask($id_tarea, $materia, $fecha_entrega, $descripcion);
    header("Location: list_tasks.php");
} else {
    $id_tarea = $_GET['id'];
    $task_data = $task->getTaskById($id_tarea);
}

?>

<form method="POST" action="edit_task.php">
    <input type="hidden" name="ID_Tarea" value="<?= $task_data['ID_Tarea']; ?>">
    Materia: <input type="text" name="Materia" value="<?= $task_data['Materia']; ?>" required><br>
    Fecha de Entrega: <input type="date" name="Fecha_Entrega" value="<?= $task_data['Fecha_Entrega']; ?>" required><br>
    Descripción: <input type="text" name="Descripcion" value="<?= $task_data['Descripcion']; ?>" required><br>
    <input type="submit" value="Actualizar Tarea">
</form>
