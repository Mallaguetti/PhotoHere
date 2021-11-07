<!DOCTYPE html>
<head lang="pt-br">
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
                        <td><input type="text" name="texto" size="40" required=""></td>
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

                    $resultado = pesquisarFotografo($conexao, $tipo, $texto);

                    while ($registro = mysqli_fetch_assoc($resultado)) {
                        $nome = $registro["nome"];
                        echo "
                        <div class='flex centro resultado'>
                            <table>
                                <tr>
                                    <td><h2>$nome</h2></td>
                                </tr>
                                <tr>
                                    <td><img src='imagens/perfil.jpg' alt=''></td>
                                </tr>
                            </table>
                            <div class='bt'>Ver perfil</div>
                        </div>
                        ";
                    }
                ?>
            </div>
        </section>
    </main>
</body>