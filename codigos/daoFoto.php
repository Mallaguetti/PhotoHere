<?php
function pesquisarFoto($conexao, $tipo, $texto){
    switch($tipo){
        case 0:
            $sql = "SELECT * FROM foto WHERE idEnsaio = '$texto'";
            break;
        case 1:
            $sql = "SELECT * FROM foto WHERE idFoto LIKE '$texto%'";
            break;
    };
    $res = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    return $res;
};
function excluirFoto($conexao, $idFoto){
    $sql = "DELETE FROM foto WHERE idFoto = $idFoto";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
}
?>