<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/styles/style.css">
    <title>Formulario de Registro</title>
</head>
<body>
    <h2>Formulario de Registro</h2>
    
    <?php if(isset($_GET['error'])): ?>
        <div class="error-message" style="color: red; background: #ffe6e6; padding: 10px; margin: 10px 0; border: 1px solid red;">
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <label for="confirmar_contrasena">Confirme su Contraseña:</label><br>
        <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>