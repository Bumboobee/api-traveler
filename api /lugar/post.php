<?php 

if(isset($_POST["cidade"]) && isset($_POST["pais"])) {
    $cidade = $_POST["cidade"];
    $pais = $_POST["pais"];
    $descricao = $_POST["descricao"];

    $stmt = $conexao->prepare("INSERT INTO lugar(cidade, pais, descricao, token) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $cidade, $pais, $descricao, $token);
    $stmt->execute();

    if($stmt->execute()) {
        http_response_code(201);
        exit;
    } else {
        http_response_code(500);
        echo "Não foi possivel adicionar o lugar, tente novamente!";
    }
    $stmt->close();
    $conexao->close();

} else {
    http_response_code(400);
    echo "Erro ao adicionar lugar. Não foram enviados os campos obrigatórios: cidade e país";
}


?>