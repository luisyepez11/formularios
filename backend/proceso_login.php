<?php
if(true){
    if($_POST){
        $nombre= $_POST["nombre"];
        $correo= $_POST["correo"];
        if(file_exists("usuarios.json")){
            $archivo = file_get_contents("usuarios.json");
            
            if($archivo){
                $usuarios = json_decode($archivo,true);
            }
            else{
                $usuarios = [];
            }
            
            $jsonUsuarios = json_encode($usuarios,JSON_PRETTY_PRINT);

            foreach($usuarios as $key => $value){
                if($value["nombre"]==$nombre){
                    
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