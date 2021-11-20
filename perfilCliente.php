<?php
    require_once "codigos/validarSessao.php";
    loginRequerido();
    if ($isFotografo){
        header("Location:perfilFotografo.php");
    };
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/perfilCliente.css">
    <link rel="stylesheet" type="text/css" media="screen and (max-width:800px)" href="estilos/individuais/perfilClienteP.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
            <a class="bt cab" href="perfilClienteEnsaios.php">Ver Ensaios</a>
            <a class="bt cab" href="encontrarFotografo.php">Procurar Fotografo</a>
            <a class="bt cab" href="codigos/logout.php">Sair</a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
                <?php
                ?>
            <div id="usuario">
            </div>
            <div id="conteudo">          
            </div>
        </section>
    </main>
</body>
</html>