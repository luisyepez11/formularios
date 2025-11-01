<?php
function validar_contrasena($contrasena) {
    if (strlen($contrasena) < 8) {
        return false;
    }
    if (!preg_match('/[A-Z]/', $contrasena)) {
        return false;
    }
    return true;
}
?>