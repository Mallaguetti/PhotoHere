<?php
    require_once "codigos/conectar.php";
    require_once "codigos/validarSessao.php";
    require_once "codigos/daoFotografo.php";
    require_once 'codigos/daoFoto.php';

    loginRequerido();
    if (!$isFotografo){
        header("Location:perfilCliente.php");
    };
    if (isset($_GET["remov"])){
        $idFoto = $_GET["remov"];
        excluirFoto($conexao, $idFoto);
    }
    if (isset($_GET["idEnsaio"])){
        $idEnsaio = $_GET["idEnsaio"];
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
    <link rel="shortcut icon" href="imagens/LOGO.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/lista.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
    <header>
        <nav>
        <?php require_once "codigos/HTMLcabecalho.php";?>
        </nav>
    </header>
    <main>
        <section id="s1">
        <div>
            <h1>Upload de arquivos</h1>
                <div>
                    <form action="codigos/upload.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idEnsaio" value="<?php echo($idEnsaio)?>">
                        <input type="file" name="arquivos[]" multiple required>
                        <input type="submit">
                        <?php echo ($msg)?>
                    </form>
                </div>
                <div class="lista">
                <?php
                    $res = pesquisarFoto($conexao, 0, $idEnsaio);
            
                    while ($registro = mysqli_fetch_assoc($res)) {
                        $idFoto = $registro["idFoto"];
                        $arquivo = $registro["arquivo"];
                        $diretorio = "fotos/$arquivo";
                        echo "
                        <div>
                            <div class = 'item'>
                                <img src='$diretorio' alt=''>
                            </div>
                            <a href='perfilFotografoEnviarFotos.php?idEnsaio=$idEnsaio&remov=$idFoto'>Remover</a>
                        </div>
                        ";
                    }
                ?>
            </div>
            <br>
            <a href="perfilFotografo.php">Voltar</a>
        </div>
        </section>
    </main>
</body>
</html>