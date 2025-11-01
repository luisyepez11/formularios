<?php
session_start();
if (isset($_SESSION["nombre"]) && $_SESSION["nombre"] != "" ){
    $nombre = $_SESSION["nombre"];
    $correo = $_SESSION["correo"];
    $fechaCreacion = "25/10/2025";
}
else{   
    header("Location: login.php");
}
$audioSource = "../frontend/src/clash_sonido.mp3"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida Personalizada</title>
    <link rel="stylesheet" href="../frontend/styles/landing.css">
</head>
<body>

    <header>
        <a href="../backend/index.php" class="logout-link">Cerrar Sesión</a>
    </header>

    <div class="container">
        
        <aside class="sidebar">
            <h3>Datos del Usuario</h3>
            <div class="user-detail">
                <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
                <p><strong>Email:</strong> <?php echo $correo; ?></p>
                <p><strong>Fecha de Creacion:</strong> <?php echo $fechaCreacion; ?></p>
            </div>
            
            <hr>
        </aside>
        
        <main class="main-content">
            
            <div class="welcome-message">
                <h1>¡Bienvenido, <?php echo $nombre; ?>!</h1>
                <p>Has iniciado sesión con éxito.</p>
            </div>
            
            <hr>
            
            <div style = "display:flex; justify-content:center;">
                <audio controls **autoplay** preload="auto" >
                    <source src="<?php echo $audioSource; ?>" type="audio/mpeg">
                </audio>
            </div>
            <div class="main-image">
                <h2>Saludos Jefe</h2>
                <img src="../frontend/src/clash_of_clans_image.jpg" alt="Imagen de bienvenida grande" width="800" height="400">
                <p>Imagen de ejemplo.</p>
            </div>
        </main>
    </div>
    
</body>
</html>