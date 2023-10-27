<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "root";

    $conexao = mysqli_connect($host, $usuario, $senha) or die ("Erro ao conectar");
    $db = mysqli_select_db($conexao, "minicurso") or die ("Erro ao selecionar db");

?>
