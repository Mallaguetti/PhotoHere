<?php
    require_once "codigos/conectar.php";
    require_once "codigos/validarSessao.php";
    require_once "codigos/daoFotografo.php";
    require_once 'codigos/daoFoto.php';

    loginRequerido();
    if (!$isFotografo){
        header("Location:perfilCliente.php");
    };
    if (isset($_GET["idEnsaio"])){
        $idEnsaio = $_GET["idEnsaio"];
    } else {
        header("Location:perfilFotografo.php");
    }

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
            <h1>Fotos enviadas</h1>
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
                            <a href='$diretorio' download='$arquivo' type='image/jpg'>baixar</a>
                        </div>
                        ";
                    }
                ?>
            </div>
            <br>
            <?php
            require_once 'codigos/daoEnsaio.php';
            $registro = mysqli_fetch_assoc(pesquisarEnsaio($conexao, "idEnsaio", $idEnsaio));
            $nota = $registro["avaliacao"];
            
            if ($nota == null) {
                echo("Ainda não avaliado</br></br>");
            } else {
                echo ("A nota dada foi: </br> <table><tr>");
                for ($f = $nota; $f >= 1; $f--){
                    echo ("<td><img src='imagens/estrela.png'></td>");
                }
                echo("<td> ($nota Estrelas)</td></tr><table></br>");
            }
            ?>            
            <a href="perfilCliente.php">Voltar</a>
        </div>
        </section>
    </main>
</body>
</html>