<?php
    function inserirEnsaio($conexao, $idCliente, $idFotografo, $data, $hora){
        $sql = "INSERT INTO ensaio(cliente, fotografo, data, hora, etapa) VALUES('$idCliente', '$idFotografo', '$data', '$hora', 0)";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    };
    function pesquisarEnsaio($conexao, $coluna, $valor) {
        $sql = "SELECT * FROM ensaio WHERE $coluna = '$valor'";
        $res = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        return $res;
    }
    function avancarEtapa($conexao, $idEnsaio){
        $registro = mysqli_fetch_assoc(pesquisarEnsaio($conexao, "idEnsaio", $idEnsaio));
    };
?>