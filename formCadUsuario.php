<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <div class="form">
                <form method="post" name="formUsuario" action="codigos/salvarUsuario.php" enctype="multipart/form-data">
                    <table>
                        <tr><th><H2>Cadastro de Usúario</H2></th></tr>
                        <tr>
                            <th>Eu sou:</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="usuarioTipo" value="1" checked>Cliente
                                <input type="radio" name="usuarioTipo" value="2">Fotógrafo
                            </td>
                        </tr>
                        <tr>
                            <th>Nome</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="nome" size="40" required=""></td>
                        </tr>
                        <tr>
                            <th>Sobrenome</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="sobrenome" size="40" required=""></td>
                        </tr>
                        <tr>
                            <th>Usuário: </th>
                        </tr>
                        <tr>
                            <td><input type="text" name="usuario" size="40" required=""></td>
                        </tr>
                        <tr>
                            <th>Senha: </th>
                        </tr>
                        <tr>
                            <td><input type="password" name="senha1" size="40" required=""></td>
                        </tr>
                        <tr>
                            <th>Repita a Senha: </th>
                        </tr>
                        <tr>
                            <td><input type="password" name="senha2" size="40" required=""></td>
                        </tr>
                            <?php
                                if(isset($_GET["msg"])){
                                    $msg=$_GET["msg"];
                                    echo "<tr><td>$msg</td></tr>";
                                };
                            ?>
                        <tr>
                            <td>
                                <input type="submit" name="btnEnviar" value="Cadastrar">
                                <a href="formLogin.php">Já tenho uma conta</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </section>
    </main>
</body>
</html>