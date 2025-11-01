<?php
session_start();
if(true){
    if($_POST){
        $nombre= $_POST["nombre"];
        $password= $_POST["contrasena"];
        $correo= $_POST["correo"];
        if(file_exists("usuarios.json")){
            $archivo = file_get_contents("usuarios.json");
            
            if($archivo){
                $usuarios = json_decode($archivo,true);
            }
            else{
                $usuarios = [];
            }
            

            foreach($usuarios as $key => $value){
                if($value["correo"]==$correo){
                    if(password_verify($password,$value["contrasena"])){
                        $_SESSION["nombre"] = $value["nombre"];
                        $_SESSION["correo"] = $value["correo"];
                        header("Location: clash.php");
                        exit;
                    } else {
                        echo "<p style='color:red;'>Contraseña incorrecta</p>";
                    }
                }
            }
            

        }else{
            $usuarios[] = $ususario;
            $jsonUsuarios = json_encode($usuarios,JSON_PRETTY_PRINT);
            file_put_contents("usuarios.json",$jsonUsuarios);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/styles/style.css">
</head>
<body>
    <h2>Inicio del Registro</h2>
    <form action="login.php" method="POST">
        <label for="correo">Correo:</label><br>
        <input type="text" id="correo" name="correo" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <button type="submit">Iniciar Sesiòn</button>
        <hr>
        <a href="index.php">Si no tienes cuenta registrate tio</a>
    </form>
</body>
</html>
