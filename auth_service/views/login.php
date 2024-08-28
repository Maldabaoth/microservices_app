<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../../shared/assets/styles.css"> <!-- Asumiendo que tienes un archivo CSS -->
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST" action="../controllers/AuthController.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') : ?>
        <p style="color: red;">Usuario o contraseña incorrectos.</p>
    <?php endif; ?>
</body>
</html>
