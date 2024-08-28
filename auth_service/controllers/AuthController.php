<?php
session_start();
require_once '../config/db.php';
require_once '../models/User.php';

$db = new PDO('mysql:host=localhost;dbname=microservices_app', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($db);  // Pasar la conexión a la base de datos
    $authenticatedUser = $user->authenticate($username, $password);

    if ($authenticatedUser) {
        $_SESSION['user_id'] = $authenticatedUser['id'];
        $_SESSION['role'] = $authenticatedUser['role'];
        $_SESSION['nombre_usuario'] = $authenticatedUser['nombre'];

        if ($_SESSION['role'] === 'profesor') {
            header("Location: ../../tasks_service/views/profesor_home.php");
        } else if ($_SESSION['role'] === 'estudiante') {
            header("Location: ../../tasks_service/views/student_home.php");
        }
        exit;
    } else {
        header("Location: ../views/login.php?error=invalid_credentials");
        exit;
    }
}
?>
