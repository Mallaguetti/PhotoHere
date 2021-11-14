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
            <?php require_once "codigos/HTMLcabecalho.php";?>
            <a href="formLogin.php"><img src="imagens/perfil.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <form method="post" name="formLogin" action="codigos/salvarPerfil.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <table>
                    <tr>
                        <th> Cep: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="cep" size="40" value="<?php echo $cep?>" required=""></td>
                    </tr>
                    <tr>
                        <th> Instagram: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="instagram" size="40" value="<?php echo $instagram?>" required=""></td>
                    </tr>
                    <tr>
                        <th> Facebook: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="facebook" size="40" value="<?php echo $facebook?>" required=""></td>
                    </tr>
                    <tr>
                        <th> Celular: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="celular" size="40" value="<?php echo $celular?>" required=""></td>
                    </tr>
                    <tr>
                        <th> Apresentação breve: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="apresentacao" size="40" value="<?php echo $apresentacao?>" required=""></td>
                    </tr>
                    <?php
                        if(isset($_GET["msg"])){
                            $msg=$_GET["msg"];
                            echo "<tr><td>$msg</td></tr>";
                        };
                    ?>
                    <tr>
                        <td>
                            <input type="submit" name="btnEnviar" value="Salvar Perfil">
                            <a href="perfilFotografo.php">Cancelar</a>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>
</html>