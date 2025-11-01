<?php
if($_POST){
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["contrasena"];
    $confirmar = $_POST["confirmar_contrasena"];

    $allowed_domains = ['hotmail.com', 'gmail.com', 'outlook.com'];
    $email_domain = substr(strrchr($correo, "@"), 1);

    if (!in_array($email_domain, $allowed_domains)) {
        header("Location: index.php?error=El dominio del correo no es válido. Solo se permiten correos de " . implode(", ", $allowed_domains));
        exit;
    }

    if($password !== $confirmar) {
        header("Location: index.php?error=Las contraseñas no coinciden");
        exit;
    }

    if($nombre == "" || $correo == "" || $password == "" || $confirmar == ""){ 
        header("Location: index.php?error=Debe tener todos los campos llenos");
        exit;
    } 
    
    else{
        $usuario = ["nombre" => $nombre, "correo" => $correo, "contrasena" => password_hash($password, PASSWORD_DEFAULT)];
        
        if(file_exists("usuarios.json")){
            $archivo = file_get_contents("usuarios.json");
            
            if($archivo){
                $usuarios = json_decode($archivo, true);
            }
            else{
                $usuarios = [];
            }
            
            $usuarios[] = $usuario;
            $jsonUsuarios = json_encode($usuarios, JSON_PRETTY_PRINT);

            if (file_put_contents("usuarios.json", $jsonUsuarios)){
                header("Location: login.php");
                exit;
            } else {
                header("Location: index.php?error=Error al guardar el usuario");
                exit;
            }

        } else {
            $usuarios = [];
            $usuarios[] = $usuario;
            $jsonUsuarios = json_encode($usuarios, JSON_PRETTY_PRINT);
            if(file_put_contents("usuarios.json", $jsonUsuarios)){
                header("Location: login.php");
                exit;
            } else {
                header("Location: index.php?error=Error al crear el archivo de usuarios");
                exit;
            }
        }
    }
}
?>