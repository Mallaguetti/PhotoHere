<?php
    require_once "codigos/validarSessao.php";
    if ($sessaoExiste) {
        header("Location:perfilCliente.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/index.css">
    <link rel="stylesheet" type="text/css" media="screen and (max-width:800px)" href="estilos/individuais/indexP.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt cab"id="logo"href="index.php">PhotoHere</a>
            <?php require_once "codigos/HTMLcabecalho.php";?>
        </nav>
    </header>
    <main>
        <section class="flex"id="s1">
            <div id="d1" class="flex">
                <h1>Seu site de fotografos</h1>
                <a class="bt" href="encontrarFotografo.php">Encontrar Fotografos</a>
            </div>
        </section>
        <section class="flex" id="s2">
            <article>
                <h1>O que queremos?</h1>
                <p>Pretendemos, por meio da fotografia, conectar as pessoas para criar e guardar momentos felizes unindo as principais tecnologias que existem hoje e facilitando seu uso, contribuindo para uma melhor satisfação dos clientes com serviços de qualidade e mais acessíveis, além de potencializar a vida profissional dos fotógrafos, simplificando e dando maior visibilidade ao seu trabalho</p>
            </article>
            <img src="imagens/fotografo.jpg" id="fotografo" alt="Fotografo">
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>