<?php
    require_once "codigos/conectar.php";
    require_once "codigos/validarSessao.php";
    require_once "codigos/daoFotografo.php";
    loginRequerido();
    if (!$isFotografo){
        header("Location:perfilCliente.php");
    };
    
    $id = $_SESSION["idSessao"];
    $registro = mysqli_fetch_assoc(pesquisarFotografo($conexao, 0, $id));

    $nome = $registro["nome"];
    $email = $registro["email"];
    $cep = $registro["cep"];
    $apresentacao = $registro["apresentacao"];
    $instagram = $registro["instagram"];
    $facebook = $registro["facebook"];
    $celular = $registro["celular"];
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
            <a class="bt cab" href="formEnsaio.php">Criar ensaio</a>
            <a class="bt cab" href="codigos/logout.php">Sair</a>
            <a href="formLogin.php"><img src="imagens/perfil.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <div class="pesquisa">         
                <?php
                    require_once 'codigos/conectar.php';
                    require_once 'codigos/daoEnsaio.php';
                    require_once 'codigos/daoCliente.php';

                    $res = pesquisarEnsaio($conexao, "fotografo", $_SESSION["idSessao"]);

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
                ?>
            </div>
        </section>
    </main>
</body>
</html>