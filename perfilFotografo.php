<!DOCTYPE html>
<head lang="pt-br">
    <title>Meu Perfil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.html">PhotoHere</a>
            <a class="bt cab" href="editarPerfil.php">Editar Perfil</a>
            <a class="bt cab" href="formEnsaio.php">Criar ensaio</a>
            <a href="formLogin.php"><img src="imagens/perfil.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <?php
                include_once "codigos/validar.php";
                echo "olá $nomeSessao";
            ?>
            <div>
                <nav>
                    
                </nav>
            </div>
        </section>
    </main>
</body>