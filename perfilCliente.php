<?php
    require_once "codigos/conectar.php";
    require_once "codigos/validarSessao.php";
    require_once "codigos/daoCliente.php";
    loginRequerido();
    if ($isFotografo){
        header("Location:perfilFotografo.php");
    };
    if (isset($_GET["msg"])){
        $msg = $_GET["msg"];
    } else {
        $msg = null;
    }
    $id = $_SESSION["idSessao"];
    $registro = mysqli_fetch_assoc(pesquisarCliente($conexao, 0, $id));

    $nome = $registro["nome"];
    $email = $registro["email"];
    $celular = $registro["celular"];

    $foto = $registro["fotoPerfil"];
    $fotoPerfil = base64_encode($foto);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagens/LOGO.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/perfilCliente.css">
    <link rel="stylesheet" type="text/css" media="screen and (max-width:800px)" href="estilos/individuais/perfilClienteP.css">
</head>
<body>
    <header>
        <nav>
        <?php require_once "codigos/HTMLcabecalho.php";?>
        </nav>
    </header>
    <main>
        <section id="s1">
            <div id="dados">
                <div class="flex cabecalho">
                    <?php
                    if ($foto != null) {
                        echo ("<a id='fotoPerfil' href='perfilCliente.php?msg=editarFoto'><img src='data:imagem/IMG_JPG;base64,$fotoPerfil'></a>");
                    } else {
                        echo ("<a id='fotoPerfil' href='perfilCliente.php?msg=editarFoto'><img src='imagens/perfil.jpg'></a>");
                    }
                    ?>
                </div>
                    <?php
                        if ($msg == "editarFoto"){
                            echo ("
                                <form method='post' name='formFotoPerfil' action='codigos/editarFotoPerfil.php' enctype='multipart/form-data'>
                                    <div>
                                        <div>
                                        <input type='hidden' name='id' value='$id'>
                                        <input type='file' name='fotoPerfil'>
                                        </div>
                                        <div>
                                        <input type='submit' name='btnEnviar' value='Salvar Foto'>
                                        <a href='perfilFotografo.php'>Cancelar</a>
                                        </div>
                                    </div>
                                </form>
                            ");
                        };
                    ?>
                <div id="nome">
                        <h1><?php echo $nome?></h1>
                    </div>
                <div>
                    <h2>Meus dados</h2>
                    <?php
                    $definido=false;
                        if(isset($celular)){
                            if ($celular != ""){
                                echo("<p>Nuemro: $celular</p>");
                                $definido=true;
                            }
                        };
                        if(isset($email)){
                            if ($email != ""){
                                echo("<p>Email: $email</p>");
                                $definido=true;
                            }
                        };
                        if(!$definido){
                            echo("<p>Você ainda não adicionou seus dados!</p>");
                        }
                    ?>
                    <a href="perfilClienteEditar.php">Editar</a>
                </div>
            </div>
            <div id="conteudo">
                <h2>Ensaios marcados</h2>
                <div class="pesquisa">         
                    <?php
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
                                    $status = "Aguardando confirmação";
                                    break;
                                case 2:
                                    $status;
                                    break;
                            }
                            echo "
                            <form class='flex centro resultado ensaio' method='post' name='formLogin' action='encontrarFotografo.php' enctype='multipart/form-dat'>
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
            </div>
        </section>
    </main>
</body>
</html>