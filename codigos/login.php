<?php
    include_once "conectar.php";
    include_once "daoCliente.php";
    include_once "daoFotografo.php";

    $usuario = $_POST["txtLogin"];
    $senha = $_POST["txtSenha"];

    if (clienteExiste($conexao, $usuario)){
        $registro = loginCliente($conexao, $usuario, $senha);
        if ($registro != null){
            $id = $registro["idCliente"];
            $nome = $registro["nome"];

            session_start();

            $_SESSION["idSessao"] = $id;
            $_SESSION["isFotografo"] = false;
            
            $_SESSION["usuarioSessao"] = $usuario;
            $_SESSION["nomeSessao"] = $nome;

            header("Location:../perfilCliente.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else if (fotografoExiste($conexao, $usuario)) {
        $registro = loginFotografo($conexao, $usuario, $senha);
        if ($registro != null){
            $id = $registro["idFotografo"];
            $nome = $registro["nome"];
            $email = $registro["email"];
            $cep = $registro["cep"];
            $apresentação = $registro["apresentação"];
            $instagram = $registro["instagram"];
            $facebook = $registro["facebook"];
            $celular = $registro["celular"];

            session_start();
            
            $_SESSION["idSessao"] = $id;
            $_SESSION["isFotografo"] = true;
            
            $_SESSION["usuarioSessao"] = $usuario;
            $_SESSION["nomeSessao"] = $nome;
            $_SESSION["emailSessao"] = $email;
            $_SESSION["cepSessao"] = $cep;
            $_SESSION["apresentaçãoSessao"] = $apresentação;
            $_SESSION["instagramSessao"] = $instagram;
            $_SESSION["facebookSessao"] = $facebook;
            $_SESSION["celularSessao"] = $celular;

            header("Location:../perfilFotografo.php");
        } else {
            header("Location:../formLogin.php?msg=Senha incorreta");
        }
    } else {
        header("Location:../formLogin.php?msg=Usuario não existe");   
    };
?>