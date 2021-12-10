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
    $sobreNome = $registro["sobreNome"];
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
        <section id="s1" class="flex">
            <form class="form" method="post" name="formLogin" action="codigos/editarUsuarioFotografo.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <table>
                    <tr>
                        <th> Nome: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nome" size="40" value="<?php echo $nome?>"></td>
                    </tr>
                    <tr>
                        <th> Sobrenome: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="sobreNome" size="40" value="<?php echo $sobreNome?>"></td>
                    </tr>
                    <tr>
                        <th> Email: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" size="40" value="<?php echo $email?>"></td>
                    </tr>
                    <tr>
                        <th> Cep: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="cep" size="40" value="<?php echo $cep?>"></td>
                    </tr>
                    <tr>
                        <th> Instagram: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="instagram" size="40" value="<?php echo $instagram?>"></td>
                    </tr>
                    <tr>
                        <th> Facebook: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="facebook" size="40" value="<?php echo $facebook?>"></td>
                    </tr>
                    <tr>
                        <th> Celular: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="celular" size="40" value="<?php echo $celular?>"></td>
                    </tr>
                    <tr>
                        <th> Apresentação breve: </th>
                    </tr>
                    <tr>
                        <td><textarea type="tex" name="apresentacao"  rows="4" cols="46"><?php echo $apresentacao?></textarea></td>
                    </tr>
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