<?php
if($_POST){
    $nombre= $_POST["nombre"];
    $correo= $_POST["correo"];
    $password= $_POST["contrasena"];
    if($nombre== "" || $correo=="" || $password=="" ){ 
        echo "Debe tener todos los campos llenos";
    }  
    else{
        $ususario = ["nombre" => $nombre,"correo" => $correo,"contrasena" => password_hash($password,PASSWORD_DEFAULT)];
        if(file_exists("usuarios.json")){
            $archivo = file_get_contents("usuarios.json");
            
            if($archivo){
                $usuarios = json_decode($archivo,true);
            }
            else{
                $usuarios = [];
            }
            
            $usuarios[] = $ususario;
            $jsonUsuarios = json_encode($usuarios,JSON_PRETTY_PRINT);

            if (file_put_contents("usuarios.json",$jsonUsuarios)){
                echo "Usuario creado con exito";
            }

        }else{
            $usuarios[] = $ususario;
            $jsonUsuarios = json_encode($usuarios,JSON_PRETTY_PRINT);
            file_put_contents("usuarios.json",$jsonUsuarios);
        }
    }
}
?>
