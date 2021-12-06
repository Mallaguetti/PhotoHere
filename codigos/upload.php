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
            date_default_timezone_set('America/Bahia');
            $novoNome = $idEnsaio."_".date('d-m-y-H-i-s')."_".$nomes[$i];

            $sql = "INSERT INTO foto VALUES(default, '$novoNome', $idEnsaio)";
            mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

            $mover = move_uploaded_file($_FILES['arquivos']['tmp_name'][$i], '../fotos/' . $novoNome);

            header("Location:../perfilFotografoEnviarFotos.php?idEnsaio=$idEnsaio&msg=Arquivos enviados com sucesso");
        } else {
            header("Location:../perfilFotografoEnviarFotos.php?msg=Alguns arquivos não foram enviados por Extencao de arquivo não permitida");
        }
    };
?>