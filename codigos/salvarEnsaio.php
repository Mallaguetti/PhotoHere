<?php
    $editar = $_POST["editar"];
    $idEnsaio = $_POST["ensaio"];
    $idCliente = $_POST["cliente"];
    $idFotografo = $_POST["fotografo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];

    require_once "conectar.php";
    require_once "daoEnsaio.php";
    if ($editar == "true"){
        editarEnsaio($conexao, $idEnsaio, $data, $hora);
        header("Location:../perfilCliente.php?msg=Cadastrado com sucesso");
    } else {
        inserirEnsaio($conexao, $idCliente, $idFotografo, $data, $hora);
        header("Location:../perfilCliente.php?msg=Cadastrado com sucesso");
    };
?>