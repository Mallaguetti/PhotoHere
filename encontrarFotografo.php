<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
    <link rel="stylesheet" type="text/css" href="estilos/pesquisa.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/#">
    <link rel="stylesheet" type="text/css" media="screen and (max-width:800px)" href="estilos/individuais/#">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
            <?php require_once "codigos/HTMLcabecalho.php";?>
        </nav>
    </header>
    <main>
        <section class="flex topo"id="s1">
            <form method="POST" action="encontrarFotografo.php">
                <table>
                    <tr>
                        <td>
                            <select name="pesquisa">
                                <option value="1">Nome</option>
                                <option value="2">CEP</option>
                            </select>
                        </td>
                        <td><input type="text" name="texto" size="40"></td>
                        <td><input type="submit" name="btnPesquisar" value="Pesquisar"></td>
                    </tr>
                </table>
            </form>
            <div class="pesquisa">         
                <?php
                    $tipo = 1;
                    $texto = "";

                    if (isset($_POST["btnPesquisar"])) {
                        $tipo = $_POST["pesquisa"];
                        $texto = $_POST["texto"];
                    };

                    require_once 'codigos/conectar.php';
                    require_once 'codigos/daoFotografo.php';

                    $res = pesquisarFotografo($conexao, $tipo, $texto);

                    while ($registro = mysqli_fetch_assoc($res)) {
                        $nome = $registro["nome"];
                        $apresentacao = $registro["apresentacao"];
                        $id = $registro["idFotografo"];

                        $foto = $registro["fotoPerfil"];
                        $fotoPerfil = base64_encode($foto);
                        echo "
                        <form class='flex centro resultado' method='post' name='formLogin' action='encontrarFotografoPerfil.php?idFotografo=$id' enctype='multipart/form-dat'>
                            <table>
                                <tr>
                                    <td><img src='data:imagem/IMG_JPG;base64,$fotoPerfil' alt=''></td>
                                    <td><h2>$nome</h2><p>$apresentacao</p></td>
                                </tr>
                            </table>
                            <input type='hidden' name='idFotografo' value='$id'>
                            <input type='submit' name='btnEnviar' value='Ver Perfil'>
                            </form>
                        ";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>