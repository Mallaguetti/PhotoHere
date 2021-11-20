<?php
    require_once "codigos/conectar.php";
    require_once "codigos/daoFotografo.php";
    require_once "codigos/validarSessao.php";
    if (!$_SESSION["isFotografo"){
        header("Location:perfilCliente.php");
    };
    $id = $_SESSION["idSessao"];
    $registro = mysqli_fetch_assoc(pesquisarFotografo($conexao, 0, $id));

    $nome = $registro["nome"];
    $email = $registro["email"];
    $cep = $registro["cep"];
    $apresentacao = $registro["apresentacao"];
    $instagram = $registro["instagram"];
    $facebook = $registro["facebook"];
    $celular = $registro["celular"];
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
            <a class="bt cab" href="perfilFotografoEnsaios.php">Ensaios</a>
            <a class="bt cab" href="codigos/logout.php">Sair</a>
            <a href="formLogin.php"><img src="imagens/perfil.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1">
            <div class="flex cabecalho">
                <a id="fotoPerfil" href=""><img src="imagens/perfil.jpg" alt=""></a>
                <div id="nome">
                    <h1><?php echo $nome?></h1>
                    <p><?php echo $apresentacao?></p>
                </div>
            </div>
            <div>
                <h2>Meus dados</h2>
                <p>nuemro: <?php echo $celular?></p>
                <p>email: <?php echo $email?></p>
                <p>facebook: <?php echo $facebook?></p>
                <p>insta: <?php echo $instagram?></p>
            </div>
            <div>
                <h2>Ensaios marcados</h2>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque qui omnis sed optio! Soluta vel impedit ad quasi, modi voluptates iure nihil ipsum praesentium ratione hic earum error ipsa exercitationem.
            </div>
            <div>
                <h2>Meus albuns</h2>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus aliquam necessitatibus sequi itaque nulla, ea tempore! Voluptas provident iusto numquam molestiae soluta tenetur nemo itaque non alias voluptatem. Atque, labore?
            </div>
        </section>
    </main>
</body>
</html>