<?php
    function inserirEnsaio($conexao, $data){
        $sql = "INSERT INTO ensaio(data) VALUES('$data')";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    };
?>