<!DOCTYPE html>
<head lang="PT-BR">
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
            <a class="bt"id="logo"href="index.html">PhotoHere</a>
            <a class="bt cab" href="#">Ver Ensaios</a>
            <a class="bt cab" href="encontrarFotografo.php">Procurar Fotografo</a>
            <a href="formLogin.php"><img src="imagens/perfil.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex"></section>    
            <div id="usuario">
            
            </div>
            <div id="conteudo">
                <?php
                    include_once "codigos/validar.php";
                    echo "<p>olá $nomeSessao</p>";
                ?>
            </div>
        </section>
    </main>
</body>