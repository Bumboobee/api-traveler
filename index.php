<?php 

// compossição url
// token/funcionalidade/id(se necessário)

// recebe os parametros da url amigavel
if(isset($_GET['parametros'])) {
    $parametros = explode("/", $_GET['parametros']);
    echo $parametros[3];

} else {
    http_response_code(400);
    echo 'A URL informada está incompleta';
    exit;
}


// validação de token
// verifica se o usuário está cadastrado no banco
if(!isset($parametros[0])) {
    http_response_code(400);
    echo 'A URL informada não possui token';
    exit;
} else {
    include_once("./libs/conexao.php");
    $token = $parametros[0];
    $sqlSelectToken = mysqli_query($conexao, "SELECT * FROM usuario WHERE token = '$token'") or die(mysqli_error($conexao));

    if(!$sqlSelectToken || mysqli_num_rows($sqlSelectToken) < 1) {
        http_response_code(400);
        echo "Token inválido";
        exit;
    }
}

// validação funcionalidades/recursos
$recursosPermitidos = ["lugar", "usuario"];

if(isset($parametros[1]) && in_array($recursosPermitidos[1], $recursosPermitidos)) {
    $funcionalidade = $parametros[1];
    echo $funcionalidade;
} else {
    http_response_code(400);
    echo "A funcionalidade ". $parametros[1] ." não existe";
    exit;
}

$id = isset($parametros[2]) ? $parametros[2] : null;

// redirecionamento
include_once("./api/".$recurso."/index.php");


?>