<?php
    require_once "conectar.php";
    require_once "daoCliente.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $sobreNome = $_POST["sobreNome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];

    editarCliente($conexao, $id, $nome, $sobreNome, $email, $celular);
    
    header("Location:../perfilFotografo.php");
?>