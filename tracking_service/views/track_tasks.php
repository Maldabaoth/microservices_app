<?php
// track_tasks.php

require_once '../models/Tracking.php';

$tracking = new Tracking();
$trackings = $tracking->getAllTrackings();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Tareas</title>
</head>
<body>
    <h1>Seguimiento de Tareas</h1>
    <?php if (count($trackings) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID Tarea</th>
                    <th>ID Estudiante</th>
                    <th>Estado</th>
                    <th>Opinión</th>
                    <th>Dificultad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trackings as $tracking): ?>
                    <tr>
                        <td><?php echo $tracking['ID_Tarea']; ?></td>
                        <td><?php echo $tracking['ID_Estudiante']; ?></td>
                        <td><?php echo $tracking['Estado']; ?></td>
                        <td><?php echo $tracking['Opinion']; ?></td>
                        <td><?php echo $tracking['Dificultad']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay tareas para mostrar.</p>
    <?php endif; ?>
</body>
</html>
