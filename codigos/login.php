<?php
    include_once "conectar.php";
    include_once "daoCliente.php";
    include_once "daoFotografo.php";

    $usuario = $_POST["txtLogin"];
    $senha = $_POST["txtSenha"];

    if (clienteExiste($conexao, $usuario)){
        $registro = loginCliente($conexao, $usuario, $senha);
        if ($registro != null){
            $nome = $registro["nome"];

            session_start();

            $_SESSION["loginSessao"] = $usuario;
            $_SESSION["isFotografo"] = false;
            
            $_SESSION["nomeSessao"] = $nome;

            header("Location:../perfilCliente.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else if (fotografoExiste($conexao, $usuario)) {
        $registro = loginFotografo($conexao, $usuario, $senha);
        if ($registro != null){
            $nome = $registro["nome"];
            
            session_start();
            
            $_SESSION["loginSessao"] = $usuario;
            $_SESSION["isFotografo"] = true;
            
            $_SESSION["nomeSessao"] = $nome;

            header("Location:../perfilFotografo.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else {
        header("Location:../formLogin.php?msg=Usuario não existe");   
    };
?>