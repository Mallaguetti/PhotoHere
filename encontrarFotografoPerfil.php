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

        $foto = $registro["fotoPerfil"];
        $fotoPerfil = base64_encode($foto);

    } else {
        header("Location:encontrarFotografo.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagens/LOGO.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/verPerfil.css">
</head>
<body>
    <header>
        <nav>
        <?php require_once "codigos/HTMLcabecalho.php";?>
        </nav>
    </header>
    <section class="flex topo"id="s1" >
        <div id="dados">
            <?php
            if ($foto != null) {
                echo ("<img style='max-width: 30vw; max-height:30vh; margin: auto;' src='data:imagem/IMG_JPG;base64,$fotoPerfil'>");
            } else {
                echo ("<img src='imagens/perfil.jpg'>");
            }
            if(isset($celular)){
                if ($celular != ""){
                    echo("<p>Nuemro: $celular</p>");
                }
            };
            if(isset($email)){
                if ($email != ""){
                    echo("<p>Email: $email</p>");
                }
            };
            if(isset($facebook)){
                if ($facebook != ""){
                    echo("<p>Facebook: $facebook</p>");
                }
            };
            if(isset($instagram)){
                if ($instagram != ""){
                    echo("<p>Instagram: $instagram</p>");
                }
            };
            require_once "codigos/validarSessao.php";
            if ($sessaoExiste) {
                if(!$isFotografo){
                    echo "<br><a href='editarEnsaio.php?id=$id&editar=false'>Marcar Ensaio</a>";
                } else {
                    echo "<br>Apenas clientes podem marcar ensaio";
                };
            } else{
                echo "<br>Faça login para marcar ensaio";
            };
            ?>
            <br>
            <a href="encontrarFotografo.php">Voltar</a>
        </div>
    </section>
</body>
</html>