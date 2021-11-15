<?php
    require_once "codigos/validarSessao.php";
    loginRequerido();
    if ($isFotografo){
        header("Location:perfilFotografo.php");
    };
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/perfilCliente.css">
    <link rel="stylesheet" type="text/css" media="screen and (max-width:800px)" href="estilos/individuais/perfilClienteP.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
            <a class="bt cab" href="encontrarFotografo.php">Procurar Fotografo</a>
            <a class="bt cab" href="codigos/logout.php">Sair</a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <div class="pesquisa">         
                <?php
                    require_once 'codigos/conectar.php';
                    require_once 'codigos/daoEnsaio.php';
                    require_once 'codigos/daoFotografo.php';

                    $res = pesquisarEnsaio($conexao, "cliente", $_SESSION["idSessao"]);

                    while ($registro = mysqli_fetch_assoc($res)) {
                        $data = $registro["data"];
                        $hora = $registro["hora"];
                        $etapa = $registro["etapa"];
                        $fotografo = $registro["fotografo"];
                        
                        $resFotografo = mysqli_fetch_assoc(pesquisarFotografo($conexao,0,$fotografo));
                        $nomeFotografo = $resFotografo["nome"];

                        switch ($etapa){
                            case 0:
                                $status = "Aguardando confirmação";
                                break;
                            case 1:
                                break;
                            case 2:
                                break;
                        }
                        echo "
                        <form class='flex centro resultado' method='post' name='formLogin' action='encontrarFotografo.php' enctype='multipart/form-dat'>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ensaio com $nomeFotografo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Data: $data</td>
                                        <td rowspan='3'>Status: $status</td>
                                    </tr>
                                    <tr>
                                        <td>Hora: $hora</td>
                                    </tr>
                                    <tr>
                                        <td>Local: </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td rowspan='2'><a href=''>Editar</a></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <input type='hidden' name='idFotografo' value=''>
                            
                            </form>
                        ";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>