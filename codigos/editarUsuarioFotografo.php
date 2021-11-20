<?php
    $id = $_POST["id"];
    $cep = $_POST["cep"];
    $instagram = $_POST["instagram"];
    $facebook = $_POST["facebook"];
    $celular = $_POST["celular"];
    $apresentacao = $_POST["apresentacao"];

    require_once "conectar.php";
    require_once "daoFotografo.php";

    salvarPerfil($conexao, $id, $cep, $instagram, $facebook, $celular, $apresentacao);
    
    header("Location:../perfilFotografoEditar.php?msg=Perfil salvo com sucesso")
?>