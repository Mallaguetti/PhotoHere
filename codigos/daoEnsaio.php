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
    if(isset($_GET['msg'])){
        require_once "conectar.php";
        
        $idEnsaio = $_GET['msg'];
        $registro = mysqli_fetch_assoc(pesquisarEnsaio($conexao, "idEnsaio", $idEnsaio));
        
        $etapa = $registro["etapa"]+1;
        
        $sql = "UPDATE ensaio SET 
        etapa = '$etapa'
        WHERE idEnsaio = $idEnsaio";

        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        header("Location:../perfilClienteEnsaios.php");
    }
?>