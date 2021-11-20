<?php
    require_once "codigos/conectar.php";
    require_once "codigos/daoFotografo.php";
    if (isset($_GET["idFotografo"])){
        $id = $_GET["idFotografo"];
        $registro = mysqli_fetch_assoc(pesquisarFotografo($conexao, 0, $id));

        $nome = $registro["nome"];
        $email = $registro["email"];
        $apresentacao = $registro["apresentacao"];
        $instagram = $registro["instagram"];
        $facebook = $registro["facebook"];
        $celular = $registro["celular"];
    } else {
        header("Location:encontrarFotografo.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/perfilCliente.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
            <?php require_once "codigos/HTMLcabecalho.php";?>
        </nav>
    </header>
    <section class="flex topo"id="s1">
        <div>
            <p>nuemro: <?php echo $celular?></p>
            <p>email: <?php echo $email?></p>
            <p>facebook: <?php echo $facebook?></p>
            <p>insta: <?php echo $instagram?></p>
        </div>
        <div>
            <a href="novoEnsaio.php?id=<?php echo $id?>">Marcar Ensaio</a>
        </div>
    </section>
</body>
</html>