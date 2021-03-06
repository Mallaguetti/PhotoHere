<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagens/LOGO.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
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
            <div class="form">
                <form method="post" name="formLogin" action="codigos/login.php" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th> Usuário: </th>
                        </tr>
                        <tr>
                            <td><input type="text" name="txtLogin" size="40" required=""></td>
                        </tr>
                        <tr>
                            <th> Senha: </th>
                        </tr>
                        <tr>
                            <td><input type="password" name="txtSenha" size="40" required=""></td>
                        </tr>
                        <?php
                            if (isset($_GET["pag"])){
                                $pag = $_GET["pag"];
                                echo "<input type='hidden' name='pag' value='$pag'>";
                            }
                            if(isset($_GET["msg"])){
                                $msg=$_GET["msg"];
                                echo "<tr><td>$msg</td></tr>";
                            };
                        ?>
                        <tr>
                            <td>
                                <input type="submit" name="btnEnviar" value="Entrar">
                                <a href="formCadUsuario.php">Cadastrar</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </section>
    </main>
</body>
</html>