<?php
// list_tasks.php

session_start();
require_once '../config/db.php';
require_once '../models/Task.php';

$task = new Task();
$tareas = $task->getAllTasks();

?>

<h1>Lista de Tareas</h1>
<table>
    <tr>
        <th>ID Tarea</th>
        <th>Materia</th>
        <th>Fecha de Entrega</th>
        <th>Descripción</th>
        <?php if ($_SESSION['role'] === 'profesor') : ?>
            <th>Acciones</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($tareas as $tarea) : ?>
        <tr>
            <td><?= $tarea['ID_Tarea']; ?></td>
            <td><?= $tarea['Materia']; ?></td>
            <td><?= $tarea['Fecha_Entrega']; ?></td>
            <td><?= $tarea['Descripcion']; ?></td>
            <?php if ($_SESSION['role'] === 'profesor') : ?>
                <td>
                    <a href="edit_task.php?id=<?= $tarea['ID_Tarea']; ?>">Editar</a>
                    <a href="delete_task.php?id=<?= $tarea['ID_Tarea']; ?>">Eliminar</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
