<?php
    $idCliente = $_POST["cliente"];
    $idFotografo = $_POST["fotografo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];

    require_once "conectar.php";
    require_once "daoEnsaio.php";

    inserirEnsaio($conexao, $idCliente, $idFotografo, $data, $hora);
    header("Location:../perfilCliente.php?msg=Cadastrado com sucesso");
?>