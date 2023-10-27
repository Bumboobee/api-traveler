<?php 
    $metodosPermitidos = ["GET", "POST", "PUT", "DELETE"];
    $metodo = $_SERVER["REQUEST_METHOD"];

    if(!in_array($metodo, $metodosPermitidos)) {
        http_response_code(400);
        echo "Método não permitido";
        exit;

    } else {
        include_once strtolower($metodo).".php";
    }

?>