<?php
// profesor_home.php

session_start();
if ($_SESSION['role'] !== 'profesor') {
    header("Location: unauthorized.php");
    exit;
}

$nombre_profesor = $_SESSION['nombre_usuario'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del Profesor</title>
    <link rel="stylesheet" href="../../shared/assets/styles.css"> <!-- Asumiendo que tienes un archivo CSS -->
</head>
<body>
    <h1>Bienvenido Profesor <?php echo $nombre_profesor; ?></h1>
    <nav>
        <ul>
            <li><a href="add_task.php">Agregar Tarea</a></li>
            <li><a href="../../tracking_service/views/track_tasks.php">Seguimiento de Tareas</a></li>
        </ul>
    </nav>
</body>
</html>
