<?php
    require_once "conectar.php";
    require_once "daoCliente.php";
    require_once "daoFotografo.php";

    session_start();

    $usuario = $_POST["txtLogin"];
    $senha = $_POST["txtSenha"];
    $pag = $_POST["pag"];

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

            if(isset($_POST["pag"])){
                header("Location:../$pag");
            }else{
                header("Location:../perfilFotografo.php");
            }
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else if (fotografoExiste($conexao, $usuario)) {
        $registro = loginFotografo($conexao, $usuario, $senha);
        if ($registro != null){
            $id = $registro["idFotografo"];
            
            $_SESSION["idSessao"] = $id;
            $_SESSION["isFotografo"] = true;

            if(isset($_POST["pag"])){
                $pag = $_POST["pag"];
                header("Location:../$pag");
            }else{
                header("Location:../perfilFotografo.php");
            }
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else {
        header("Location:../formLogin.php?msg=Usuario não existe");   
    };
?>