<?php
    $nome = $_POST["nomeCliente"];
    $data = $_POST["dtEnsaio"];

    include_once "conectar.php";
    include_once "daoEnsaio.php";

    inserirEnsaio($conexao, $data);
    header("Location:../formEnsaio.php?msg=Cadastrado com sucesso");
?>