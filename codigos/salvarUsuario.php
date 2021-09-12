<?php
    $usuarioTipo = $_POST["usuarioTipo"];
    $nome = $_POST["nome"];
    $sobreNome = $_POST["sobreNome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $senha1 = $_POST["senha1"];
    $senha2 = $_POST["senha2"];

    include_once"conect.php";
    include_once"daoUsuario.php";

    if ($senha1==$senha2){
        if ($usuarioTipo==1) {
            inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha1, $email);
        };
        if ($usuarioTipo==2) {
            inserirFotografo($conexao, $nome, $sobreNome, $usuario, $senha1, $email);
        };
        header("Location:../formUsuario.php?msg=Cadastrado com sucesso");
    } else {
        header("Location:../formUsuario.php?msg=Senhas não correspondem");
    };
?>