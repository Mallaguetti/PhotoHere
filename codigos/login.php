<?php
    include_once "conectar.php";
    include_once "daoCliente.php";
    include_once "daoFotografo.php";

    session_start();

    $usuario = $_POST["txtLogin"];
    $senha = $_POST["txtSenha"];

    if (isset($_SESSION["usuarioSessao"])){
        $usuario = $_SESSION["usuarioSessao"];
        $senha = $_SESSION["senhaSessao"];
    }

    if (clienteExiste($conexao, $usuario)){
        $registro = loginCliente($conexao, $usuario, $senha);
        if ($registro != null){
            $id = $registro["idCliente"];
            $nome = $registro["nome"];

            $_SESSION["idSessao"] = $id;
            $_SESSION["isFotografo"] = false;

            header("Location:../perfilCliente.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else if (fotografoExiste($conexao, $usuario)) {
        $registro = loginFotografo($conexao, $usuario, $senha);
        if ($registro != null){
            $id = $registro["idFotografo"];
            
            $_SESSION["idSessao"] = $id;
            $_SESSION["isFotografo"] = true;

            header("Location:../perfilFotografo.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else {
        header("Location:../formLogin.php?msg=Usuario não existe");   
    };
?>