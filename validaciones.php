<?php
function validar_email($email) {
    return strlen($email) >= 6 && substr_count($email, "@") == 1 && substr_count($email, ".") >= 1 &&
           strpos($email, "@") > 0 && strpos($email, ".") > strpos($email, "@");
}  // Valida @ y punto básico[page:1]

function validar_password($pass) {
    return strlen($pass) >= 6 &&
           preg_match("/[a-zA-Z]/", $pass) &&  // Al menos una letra
           preg_match("/[0-9]/", $pass) &&     // Al menos un número
           preg_match("/[^a-zA-Z0-9]/", $pass); // Al menos un símbolo
}

function campos_llenos($datos) {
    foreach ($datos as $dato) {
        if (empty(trim($dato))) return false;
    }
    return true;
}
?>
