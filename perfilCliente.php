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
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
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
                <h2>Meu perfil</h2>
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
                            echo("<p>Voc?? ainda n??o adicionou seus dados!</p>");
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
                        $isNull = true;
                        $res = pesquisarEnsaio($conexao, "cliente", $_SESSION["idSessao"]);
                        
                        $resIsNull = false;
                        while ($registro = mysqli_fetch_assoc($res)) {
                            $isNull = false;
                            $idEnsaio = $registro["idEnsaio"];
                            $data = $registro["data"];
                            $hora = $registro["hora"];
                            $etapa = $registro["etapa"];
                            $idFotografo = $registro["fotografo"];

                            $data = explode("-", $data);
                            
                            $ano = $data[0];
                            $mes = $data[1];
                            $dia = $data[2];

                            $resFotografo = mysqli_fetch_assoc(pesquisarFotografo($conexao,0,$idFotografo));
                            $nomeFotografo = $resFotografo["nome"];

                            switch ($etapa){
                                case 0:
                                    $status = "Aguardando confirma????o";
                                    $acao = "<td rowspan='2'><a href='codigos/editarEnsaio.php?msg=0&id=$idEnsaio'>Cancelar</a></td>
                                    <td rowspan='2'><a href='editarEnsaio.php?id=$idFotografo&editar=true&ensaio=$idEnsaio'>Editar</a></td>";
                                    break;
                                case 1:
                                    $status = "Aguardando envio de Fotos";
                                    $acao = "";
                                    break;
                                case 2:
                                    $status = "fotos recebidas";
                                    $nota = $registro["avaliacao"];
                                    $acao = "<td rowspan='3'><a href='perfilClienteVerFotos.php?idEnsaio=$idEnsaio'>Ver fotos</a></td></tr></tables></br>";
                                    
                                    if (isset($nota)){
                                        $estrelas = null;
                                        for ($f = $nota; $f >= 1; $f--){
                                            $estrelas = $estrelas.("<img src='imagens/estrela.png'>");
                                        }
                                        $nota = ("<table><tr><td>Avalia????o:</td><td>".$estrelas."</td><td>($nota Estrelas)</td></tr></table>");
                                    } else {
                                        $nota = ("Ainda n??o avaliado");
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
                                            <th>Ensaio com $nomeFotografo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Data: $dia / $mes / $ano</td>
                                            <td rowspan='3'> &nbsp &nbsp Status: $status</td>
                                        </tr>
                                        <tr>
                                            <td>Hora: $hora</td>
                                        </tr>
                                    </tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            $acao
                                        </tr>
                                </table>
                                <input type='hidden' name='idFotografo' value=''>
                                $nota
                            </form>
                            ";
                            $nota = null;
                        }
                        if ($isNull){
                            echo ("<p>Voc?? ainda n??o tem ensaios!</p>");
                            echo ("<a href='encontrarFotografo.php'>Encontre um fotografo</a> e marque um agora mesmo");
                            $resIsNull = true;
                        }else{
                            echo ("<a href='encontrarFotografo.php'><p>Procurar mais fotografos</p></a>");  
                        };
                        
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>