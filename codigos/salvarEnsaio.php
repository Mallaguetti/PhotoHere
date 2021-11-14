<?php
    $nome = $_POST["nomeCliente"];
    $data = $_POST["dtEnsaio"];

    require_once "conectar.php";
    require_once "daoEnsaio.php";

    inserirEnsaio($conexao, $data);
    header("Location:../formEnsaio.php?msg=Cadastrado com sucesso");
?>