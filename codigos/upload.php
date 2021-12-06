<?php
    require_once "conectar.php";
    
    $idEnsaio = $_POST["id"];
    $arquivos = $_FILES['arquivos'];
    $permitidos = ['jpg','jpeg','png'];
    $nomes = $arquivos['name'];
    
    for ($i = 0; $i < count($nomes); $i++){
        $extencao = explode('.',$nomes[$i]);
        $extencao = end($extencao);

        if (in_array($extencao,$permitidos)){
            $sql = "INSERT INTO foto VALUES(default, '$nomes[$i]', $idEnsaio)";
            mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
            header("Location:../perfilFotografoEnviarFotos.php?idEnsaio=$idEnsaio&msg=Arquivos enviados com sucesso");
        } else {
            header("Location:../perfilFotografoEnviarFotos.php?msg=Alguns arquivos não foram enviados por Extencao de arquivo não permitida");
        }
    };
?>