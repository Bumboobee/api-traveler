<?php 
    $flag = !is_null($id) ? " AND idLugar = '$id' " : ""; 
    $sqlSelectLugar = mysqli_query($conexao, "SELECT * FROM lugar WHERE token = '$token' $flag") or die (mysqli_error($conexao));

    if($sqlSelectLugar) {
        $total = mysqli_num_rows($sqlSelectLugar);

        if($total < 1) {
            http_response_code(204);
            exit;
        } else {
            while($linha = mysqli_fetch_assoc($sqlSelectLugar)) {
                $dados[] = $linha;
            }

            echo json_encode($dados, JSON_PRETTY_PRINT);
        }
    } else {
        http_response_code(500);
        echo "Erro ao selecionar os lugares, tente novamente!";
    }
   

?>