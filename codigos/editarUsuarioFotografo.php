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


    $extencao = strtolower(substr($_FILES['arquivo']['name'],-4));
    $novoNome = md5(time()).$extencao;
    $diretorio = 'imagens/';

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novoNome);

    editarFotografo($conexao, $id, $nome, $sobreNome, $email, $cep, $instagram, $facebook, $celular, $apresentacao);
    
    header("Location:../perfilFotografoEditar.php?msg=Perfil salvo com sucesso");
?>