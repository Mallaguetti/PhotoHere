<?php
if(isset($_GET['msg'])){
    require_once "conectar.php";
    require_once "daoEnsaio.php";

    $msg = $_GET['msg'];
    $idEnsaio = $_GET['id'];

    switch($msg){
        case 0: //Excluir
            excluirEnsaio($conexao, $idEnsaio);
            header("Location:../perfilCliente.php");
            break;

        case 1: //Avançar etapa
            $registro = mysqli_fetch_assoc(pesquisarEnsaio($conexao, "idEnsaio", $idEnsaio));
            $etapa = $registro["etapa"]+1;
            
            $sql = "UPDATE ensaio SET 
            etapa = '$etapa'
            WHERE idEnsaio = $idEnsaio";

            mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
            header("Location:../perfilCliente.php");
            break;
    }
} else {
    echo"msg não definida";
};
?>