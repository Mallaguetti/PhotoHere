<?php
    $usuarioTipo = $_POST["usuarioTipo"];
    $nome = $_POST["nome"];
    $sobreNome = $_POST["sobrenome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha1"];
    $senha2 = $_POST["senha2"];

    include_once "conectar.php";
    include_once "daoFotografo.php";
    include_once "daoCliente.php";

    if (fotografoExiste($conexao, $usuario) || clienteExiste($conexao, $usuario)){
        header("Location:../formCadUsuario.php?msg=Usuario já existe");
    } else {
        if ($senha==$senha2){
            if ($usuarioTipo==1) {
                inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha, $email);

                session_start();
                $_SESSION["usuarioSessao"] = $usuario;
                $_SESSION["senhaSessao"] = $senha;

                header("Location:login.php");
            };
            if ($usuarioTipo==2) {
                inserirFotografo($conexao, $nome, $sobreNome, $usuario, $senha, $email);

                $_POST["txtLogin"] = $usuario;
                $_POST["txtSenha"] = $senha;

                header("Location:login.php");
            };
        } else {
            header("Location:../formCadUsuario.php?msg=Senhas não correspondem");
        };
    }
?>