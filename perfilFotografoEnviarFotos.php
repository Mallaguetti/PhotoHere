<?php
    require_once "codigos/conectar.php";
    require_once "codigos/validarSessao.php";
    require_once "codigos/daoFotografo.php";

    loginRequerido();
    if (!$isFotografo){
        header("Location:perfilCliente.php");
    };
    if (isset($_GET["idEnsaio"])){
        $id = $_GET["idEnsaio"];
    } else {
        header("Location:perfilFotografo.php");
    }
    if (isset($_GET["msg"])){
        $msg = $_GET["msg"];
    } else {
        $msg = null;
    }
    
#    $msg = false;
#    if(isset($_FILES['arquivo'])){
#        $extencao = strtolower(substr($_FILES['arquivo']['name'],-4));
#        $novoNome = md5(time()) . $extencao;
#        $diretorio = 'imagens/';
#        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novoNome);
#        $sql = "INSERT INTO ensaio (diretorio) VALUES($diretorio)";
#        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
#    }
#    $id = $_SESSION["idSessao"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Meu Perfil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
            <?php require_once "codigos/HTMLcabecalho.php";?>
            <a href="formLogin.php"><img src="<?php echo ("data:imagem/IMG_JPG;base64,$fotoPerfil")?>" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <h1>Upload de arquivos</h1>
            <form action="codigos/upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo($id)?>">
                <input type="file" name="arquivos[]" multiple required>
                <input type="submit">
                <?php echo ($msg)?>
            </form>
        </section>
    </main>
</body>
</html>