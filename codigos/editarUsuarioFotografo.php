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



    editarFotografo($conexao, $id, $nome, $sobreNome, $email, $cep, $instagram, $facebook, $celular, $apresentacao);
    
    header("Location:../perfilFotografoEditar.php?msg=Perfil salvo com sucesso");
?>