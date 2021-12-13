<?php
    require_once "conectar.php";
    require_once "daoFotografo.php";
    require_once "daoCliente.php";
    require_once "validarSessao.php";

    $msg = null;
    $id = $_POST["id"];
    //Validação da foto de perfil
    $arquivo = $_FILES["fotoPerfil"];
    if ($arquivo['error'] != 0 ){//Validação no upload
        $msg = 'Erro no upload da imagem';

    } else {//Validação no formato
        if (($arquivo['type'] != "image/gif") &&
            ($arquivo['type'] != "image/jpeg") &&
            ($arquivo['type'] != "image/pjpeg") &&
            ($arquivo['type'] != "image/png") &&
            ($arquivo['type'] != "image/x-png") &&
            ($arquivo['type'] != "image/bmp")){
            $msg = 'Formato do arquivo incompatível';

        } else {//Validação no tamanho
            if ($arquivo['size'] > 1000000) {
                $msg = 'Arquivo de imagem muito grande';

            } else {//Arquivo validado
                $tamanho = $arquivo["size"];
                $arq = fopen($arquivo["tmp_name"], "r");
                $foto = addslashes(fread($arq,$tamanho));
                if($isFotografo){
                    altFotoFotografo($conexao, $id, $foto);
                } else {
                    altFotoCliente($conexao, $id, $foto);
                }
            }
        }
    }
    if ($msg != null){
        header("Location:../perfilFotografo.php?msg=$msg");
    } else {
        header("Location:../perfilFotografo.php");
    }
?>