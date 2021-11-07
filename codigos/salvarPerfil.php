<?php
    $id = $_POST["id"];
    $cep = $_POST["cep"];
    $instagram = $_POST["instagram"];
    $facebook = $_POST["facebook"];
    $celular = $_POST["celular"];
    $apresentação = $_POST["apresentação"];

    include_once "conectar.php";
    include_once "daoFotografo.php";

    salvarPerfil($conexao, $id, $cep, $instagram, $facebook, $celular, $apresentação);
    
?>