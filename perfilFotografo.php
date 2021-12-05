<?php
    require_once "codigos/conectar.php";
    require_once "codigos/validarSessao.php";
    require_once "codigos/daoFotografo.php";
    loginRequerido();
    if (!$isFotografo){
        header("Location:perfilCliente.php");
    };
    if (isset($_GET["msg"])){
        $msg = $_GET["msg"];
    } else {
        $msg = null;
    }
    $id = $_SESSION["idSessao"];
    $registro = mysqli_fetch_assoc(pesquisarFotografo($conexao, 0, $id));

    $nome = $registro["nome"];
    $email = $registro["email"];
    $cep = $registro["cep"];
    $apresentacao = $registro["apresentacao"];
    $instagram = $registro["instagram"];
    $facebook = $registro["facebook"];
    $celular = $registro["celular"];

    $foto = $registro["fotoPerfil"];
    $fotoPerfil = base64_encode($foto);
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
            <a class="bt cab" href="perfilFotografoEditar.php">Editar Perfil</a>
            <a class="bt cab" href="codigos/logout.php">Sair</a>
        </nav>
    </header>
    <main>
        <section id="s1">
            <div id="dados">
                <div class="flex cabecalho">
                    <?php
                    if ($foto != null) {
                        echo ("<a id='fotoPerfil' href='perfilFotografo.php?msg=editarFoto'><img src='('data:imagem/IMG_JPG;base64,$fotoPerfil')'></a>");
                    } else {
                        echo ("<a id='fotoPerfil' href='perfilFotografo.php?msg=editarFoto'><img src='imagens/perfil.jpg'></a>");
                    }
                    ?>
                </div>
                <?php
                    if ($msg == "editarFoto"){
                        echo ("
                            <form method='post' name='formLogin' action='codigos/editarUsuarioFotografo.php' enctype='multipart/form-data'>
                                <input type='file' name='fotoPerfil'>
                            </form>
                        ");
                    };
                    ?>
                <div id="nome">
                        <h1><?php echo $nome?></h1>
                        <p><?php echo $apresentacao?></p>
                    </div>
                <div>
                    <h2>Meus dados</h2>
                    <p>nuemro: <?php echo $celular?></p>
                    <p>email: <?php echo $email?></p>
                    <p>facebook: <?php echo $facebook?></p>
                    <p>insta: <?php echo $instagram?></p>
                </div>
            </div>
            <div>
                <div>
                    <h2>Ensaios marcados</h2>
                    <div class="pesquisa">         
                        <?php
                            require_once 'codigos/conectar.php';
                            require_once 'codigos/daoEnsaio.php';
                            require_once 'codigos/daoCliente.php';

                            $res = pesquisarEnsaio($conexao, "fotografo", $_SESSION["idSessao"]);
                            if (mysqli_fetch_assoc($res) == null){
                                echo "
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Sem ensaios no momento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                ";
                            }else{
                                while ($registro = mysqli_fetch_assoc($res)) {
                                    $idEnsaio = $registro["idEnsaio"];
                                    $data = $registro["data"];
                                    $hora = $registro["hora"];
                                    $etapa = $registro["etapa"];
                                    $cliente = $registro["cliente"];
                                    
                                    $resCliente = mysqli_fetch_assoc(pesquisarCliente($conexao,0,$cliente));
                                    $nomeCliente = $resCliente["nome"];

                                    switch ($etapa){
                                        case 0:
                                            $status = "Confirmação pendente";
                                            break;
                                        case 1:
                                            $status = "Aguardando fotos";
                                            break;
                                        case 2:
                                            break;
                                    }
                                    echo "
                                    <form class='flex centro resultado' method='post' name='formLogin' action='encontrarFotografo.php' enctype='multipart/form-dat'>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Ensaio com $nomeCliente</th>
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
                                                    <td rowspan='2'><a href='codigos/editarEnsaio.php?msg=0&id=$idEnsaio'>Cancelar</a></td>
                                                    <td rowspan='2'><a href='codigos/editarEnsaio.php?msg=1&id=$idEnsaio'>Confirmar</a></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <input type='hidden' name='idFotografo' value=''>
                                        
                                        </form>
                                    ";
                                }
                            }
                        ?>
                    </div>
                <div>
                    <h2>Meus albuns</h2>
                </div>
            </div>
        </section>
    </main>
</body>
</html>