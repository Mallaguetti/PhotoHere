<?php
    include_once "conectar.php";
    include_once "daoCliente.php";
    include_once "daoFotografo.php";

    $login = $_POST["txtLogin"];
    $senha = $_POST["txtSenha"];

    if (clienteExiste($conexao, $login)){
        $registro = loginCliente($conexao, $login, $senha);
        if ($registro != null){
            $nome = $registro["nome"];

            session_start();
            $_SESSION["loginSessao"] = $login;
            $_SESSION["nomeSessao"] = $nome;

            header("Location:../perfilCliente.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else if (fotografoExiste($conexao, $login)) {
        $registro = loginFotografo($conexao, $login, $senha);
        if ($registro != null){
            $nome = $registro["nome"];
            
            session_start();
            $_SESSION["loginSessao"] = $login;
            $_SESSION["nomeSessao"] = $nome;

            header("Location:../perfilFotografo.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else {
        header("Location:../formLogin.php?msg=Usuario não existe");   
    };
?>