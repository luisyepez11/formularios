<?php
if($_POST){
    $nombre= $_POST["nombre"];
    $correo= $_POST["correo"];
    $password= $_POST["contrasena"];

    $allowed_domains = ['hotmail.com', 'gmail.com', 'outlook.com'];
    $email_domain = substr(strrchr($correo, "@"), 1);

    if (!in_array($email_domain, $allowed_domains)) {
        echo "El dominio del correo no es válido. Solo se permiten correos de  " . implode(", ", $allowed_domains);
        exit;
    }


    if($nombre== "" || $correo=="" || $password=="" ){ 
        echo "Debe tener todos los campos llenos";
    }  
    else{
        $ususario = ["nombre" => $nombre,"correo" => $correo,"contrasena" => password_hash($password,PASSWORD_DEFAULT)];
        if(file_exists("usuarios.json")){
            $archivo = file_get_contents("usuarios.json");
            
            if($archivo){
                $usuarios = json_decode($archivo,true);
                print_r($usuarios);
            }
            else{
                $usuarios = [];
            }
            
            $usuarios[] = $ususario;
            $jsonUsuarios = json_encode($usuarios,JSON_PRETTY_PRINT);

            if (file_put_contents("usuarios.json",$jsonUsuarios)){
                header("Location: login.php");
                exit;
            }

        }else{
            $usuarios[] = $ususario;
            $jsonUsuarios = json_encode($usuarios,JSON_PRETTY_PRINT);
            file_put_contents("usuarios.json",$jsonUsuarios);
        }
    }
}
?>
