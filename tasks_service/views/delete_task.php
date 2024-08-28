<?php
// delete_task.php

session_start();
if ($_SESSION['role'] !== 'profesor') {
    header("Location: unauthorized.php");
    exit;
}

require_once '../config/db.php';
require_once '../models/Task.php';

if (isset($_GET['id'])) {
    $id_tarea = $_GET['id'];

    $task = new Task();
    $task->deleteTask($id_tarea);

    header("Location: list_tasks.php");
} else {
    header("Location: list_tasks.php"); // Si no se proporciona un ID, redirige de vuelta a la lista
}
