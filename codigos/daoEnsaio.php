<?php
    function pesquisarEnsaio($conexao, $coluna, $valor) {
        $sql = "SELECT * FROM ensaio WHERE $coluna = '$valor'";
        $res = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        return $res;
    };
    function inserirEnsaio($conexao, $idCliente, $idFotografo, $data, $hora){
        $sql = "INSERT INTO ensaio(cliente, fotografo, data, hora, etapa) VALUES('$idCliente', '$idFotografo', '$data', '$hora', 0)";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    };
    function editarEnsaio($conexao, $id, $data, $hora) {
        $sql = "UPDATE ensaio SET 
        data = '$data',
        hora = '$hora'
        WHERE idEnsaio = $id";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    };
    function avaliarEnsaio($conexao, $id, $nota) {
        $sql = "UPDATE ensaio SET 
        avaliacao = '$nota'
        WHERE idEnsaio = $id";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    };
    function excluirEnsaio($conexao, $id){
        $sql = "DELETE FROM ensaio WHERE idEnsaio = $id";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    }
?>