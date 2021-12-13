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
    <link rel="shortcut icon" href="imagens/LOGO.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
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
            <div id="dados">
            <h2>Meu perfil</h2>
                <div class="flex cabecalho">
                    <?php
                    if ($foto != null) {
                        echo ("<a id='fotoPerfil' href='perfilFotografo.php?msg=editarFoto'><img src='data:imagem/IMG_JPG;base64,$fotoPerfil'></a>");
                    } else {
                        echo ("<a id='fotoPerfil' href='perfilFotografo.php?msg=editarFoto'><img src='imagens/perfil.jpg'></a>");
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
                        <p><?php echo $apresentacao?></p>
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
                        if(isset($facebook)){
                            if ($facebook != ""){
                                echo("<p>Facebook: $facebook</p>");
                                $definido=true;
                            }
                        };
                        if(isset($instagram)){
                            if ($instagram != ""){
                                echo("<p>Instagram: $instagram</p>");
                                $definido=true;
                            }
                        };
                        if(!$definido){
                            echo("<p>Você ainda não adicionou seus dados!</p>");
                        }
                    ?>
                    <a href="perfilFotografoEditar.php">Editar</a>
                </div>
            </div>
            <div id="conteudo">
                <h2>Ensaios</h2>
                <div class="pesquisa">         
                    <?php
                        require_once 'codigos/daoEnsaio.php';
                        require_once 'codigos/daoCliente.php';
                        $isNull = true;
                        $res = pesquisarEnsaio($conexao, "fotografo", $_SESSION["idSessao"]);
                        while ($registro = mysqli_fetch_assoc($res)) {
                            $isNull = false;
                            $idEnsaio = $registro["idEnsaio"];
                            $data = $registro["data"];
                            $hora = $registro["hora"];
                            $etapa = $registro["etapa"];
                            $idCliente = $registro["cliente"];

                            $resCliente = mysqli_fetch_assoc(pesquisarCliente($conexao,0,$idCliente));
                            $nomeCliente = $resCliente["nome"];

                            switch ($etapa){
                                case 0:
                                    $status = "Confirmação pendente";
                                    $acao = "<td rowspan='2'><a href='codigos/editarEnsaio.php?msg=0&id=$idEnsaio'>Cancelar</a></td>
                                    <td rowspan='2'><a href='codigos/editarEnsaio.php?msg=1&id=$idEnsaio'>Confirmar</a></td>";
                                    break;
                                case 1:
                                    require_once 'codigos/daoFoto.php';
                                    $resultado = pesquisarFoto($conexao, 0, $idEnsaio);
                                    $numFotos=0;
                                    while ($registro = mysqli_fetch_assoc($resultado)) {
                                        $numFotos += 1;
                                    }
                                    if ($numFotos == 0){
                                        $status = "Aguardando fotos";
                                        $acao = "";
                                    } else {
                                        $status = "$numFotos selecionadas";
                                        $acao = "<td rowspan='2'><a href='codigos/editarEnsaio.php?msg=1&id=$idEnsaio'>Finalizar envio</a></td>";
                                    }
                                    $acao = "<td rowspan='2'><a href='perfilFotografoEnviarFotos.php?idEnsaio=$idEnsaio'>Enviar Fotos</a></td>".$acao;
                                    break;
                                case 2:
                                    $status = "Ensaio Concluido";
                                    $nota = $registro["avaliacao"];
                                    $acao = "<td rowspan='2'><a href='perfilFotografoVerFotos.php?idEnsaio=$idEnsaio'>Ver Fotos</a></td>";

                                    if (isset($nota)){
                                        $estrelas = null;
                                        for ($f = $nota; $f >= 1; $f--){
                                            $estrelas = $estrelas.("<img src='imagens/estrela.png'>");
                                        }
                                        $nota = ("<table><tr><td>Avaliação:</td><td>".$estrelas."</td><td>($nota Estrelas)</td></tr></table>");
                                    } else {
                                        $nota = ("Aguardando avaliação");
                                    } 
                                    break;
                            }
                            if (!isset($nota)) {
                                $nota = null;
                            }
                            echo "
                            <form class='flex centro resultado ensaio' method='post' name='formLogin' action='encontrarFotografo.php' enctype='multipart/form-dat'>
                                <table class='tbEnsaio'>
                                    <thead>
                                        <tr>
                                            <th>Ensaio com $nomeCliente</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Data: $data</td>
                                            <td rowspan='3'> &nbsp &nbsp Status: $status</td>
                                        </tr>
                                        <tr>
                                            <td>Hora: $hora</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            $acao
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type='hidden' name='idFotografo' value=''>
                                $nota
                                </form>
                            ";
                            $nota = null;
                        }
                        if  ($isNull){
                            echo ("</br><p>Você não tem ensaios!</p>");
                        };
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>