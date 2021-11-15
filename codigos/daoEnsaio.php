<?php
    function inserirEnsaio($conexao, $idCliente, $idFotografo, $data, $hora){
        $sql = "INSERT INTO ensaio(cliente, fotografo, data, hora, etapa) VALUES('$idCliente', '$idFotografo', '$data', '$hora', 0)";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    };
    function avancarEtapa($conexao, $idEnsaio){

    };
?>