<?php
    $id = $_POST["id"];
    $cep = $_POST["cep"];
    $instagram = $_POST["instagram"];
    $facebook = $_POST["facebook"];
    $celular = $_POST["celular"];
    $apresentação = $_POST["apresentação"];

    require_once "conectar.php";
    require_once "daoFotografo.php";

    salvarPerfil($conexao, $id, $cep, $instagram, $facebook, $celular, $apresentação);
    
    header("Location:../perfilFotografoEditar.php?msg=Perfil salvo com sucesso")
?>