<?php
    $usuarioTipo = $_POST["usuarioTipo"];
    $nome = $_POST["nome"];
    $sobreNome = $_POST["sobreNome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $senha1 = $_POST["senha1"];
    $senha2 = $_POST["senha2"];

    include_once"conectar.php";
    include_once"daoFotografo.php";
    include_once"daoCliente.php";

    if ($senha1==$senha2){
        if ($usuarioTipo==1) {
            inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha1, $email);
        };
        if ($usuarioTipo==2) {
            inserirFotografo($conexao, $nome, $sobreNome, $usuario, $senha1, $email);
        };
        header("Location:../formCadUsuario.php?msg=Cadastrado com sucesso");
    } else {
        header("Location:../formCadUsuario.php?msg=Senhas não correspondem");
    };
?>