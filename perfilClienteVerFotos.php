<?php
    require_once "codigos/conectar.php";
    require_once "codigos/validarSessao.php";
    require_once "codigos/daoFotografo.php";
    require_once 'codigos/daoFoto.php';

    loginRequerido();
    if ($isFotografo){
        header("Location:perfilFotografo.php");
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
            <h1>Suas fotos</h1>
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
                echo("
                <form method='post' action='codigos/avaliarEnsaio.php' >
                    <table>   
                        <thead>
                            <th colspan='6'>Avalie o serviço</th>
                        </thead> ");
                        for ($i = 5; $i >= 1; $i--){
                            echo ("<tr>");
                            echo ("<td><input name='nota' type='radio' required='' value = '$i'></td>");
                            for ($f = $i; $f >= 1; $f--){
                                echo ("<td><img src='imagens/estrela.png'></td>");
                            }
                            echo (" <td colspan = '5'>($i estrelas)</td></tr>");
                        }
                echo("</table>
                    <input type='hidden' name='idEnsaio' value='$idEnsaio'>
                    <input type='submit' name='btnEnviar' value='enviar avaliação'>
                </form>");
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