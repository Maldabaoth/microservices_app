<?php
// Configuración de la conexión a la base de datos para el servicio de seguimiento de tareas

define('DB_HOST', 'localhost'); // Cambia esto si tu base de datos está en otro host
define('DB_USER', 'root');      // Cambia esto por tu usuario de base de datos
define('DB_PASS', '');          // Cambia esto por tu contraseña de base de datos
define('DB_NAME', 'microservices_app'); // Cambia esto por el nombre de tu base de datos

function connect() {
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($connection->connect_error) {
        die("Conexión fallida: " . $connection->connect_error);
    }
    
    return $connection;
}
?>
