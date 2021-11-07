<?php
    require_once "codigos/validarSessao.php";
    loginRequerido();
    if (!$isFotografo){
        header("Location:perfilCliente.php");
    };
    $id = $_SESSION["idSessao"];
    $nome = $_SESSION["nomeSessao"];
    $email = $_SESSION["emailSessao"];
    $cep = $_SESSION["cepSessao"];
    $apresentação = $_SESSION["apresentaçãoSessao"];
    $instagram = $_SESSION["instagramSessao"];
    $facebook = $_SESSION["facebookSessao"];
    $celular = $_SESSION["celularSessao"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meu Perfil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
            <a class="bt cab" href="perfilFotografoEditar.php">Editar Perfil</a>
            <a class="bt cab" href="formEnsaio.php">Criar ensaio</a>
            <a class="bt cab" href="codigos/logout.php">Sair</a>
            <a href="formLogin.php"><img src="imagens/perfil.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <div>
                
            </div>
        </section>
    </main>
</body>
</html>