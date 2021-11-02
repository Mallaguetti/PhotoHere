<!DOCTYPE html>
<head lang="pt-br">
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.html">PhotoHere</a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
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
                        <td><input type="text" name="txtSenha" size="40" required=""></td>
                    </tr>
                    <?php
                        if(isset($_GET["msg"])){
                            $msg=$_GET["msg"];
                            echo "<tr><td>$msg</td></tr>";
                        };
                    ?>
                    <tr>
                        <td><input type="submit" name="btnEnviar" value="Entrar"></td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>