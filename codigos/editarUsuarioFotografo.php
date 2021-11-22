<?php
    require_once "conectar.php";
    require_once "daoFotografo.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sobreNome = $_POST["sobreNome"];
    $email = $_POST["email"];
    $cep = $_POST["cep"];
    $instagram = $_POST["instagram"];
    $facebook = $_POST["facebook"];
    $celular = $_POST["celular"];
    $apresentacao = $_POST["apresentacao"];

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
            if ($arquivo['size'] > 100000) {
                $msg = 'Arquivo de imagem muito grande';

            } else {//Arquivo validado
                $tamanho = $arquivo["size"];
                $arq = fopen($arquivo["tmp_name"], "r");
                $foto = addslashes(fread($arq,$tamanho));

                altFotoFotografo($conexao, $id, $foto);
            }
        }
    }
    if (isset($msg)){
        header("Location:../perfilFotografoEditar.php?msg=$msg");
    }

    $extencao = strtolower(substr($_FILES['arquivo']['name'],-4));
    $novoNome = md5(time()).$extencao;
    $diretorio = 'imagens/';

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novoNome);

    editarFotografo($conexao, $id, $nome, $sobreNome, $email, $cep, $instagram, $facebook, $celular, $apresentacao);
    
    header("Location:../perfilFotografoEditar.php?msg=Perfil salvo com sucesso");
?>