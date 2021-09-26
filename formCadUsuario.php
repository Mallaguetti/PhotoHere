<!DOCTYPE html>
<head lang="pt-br">
    <title>Cadastro</title>
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
        <section id="s1" class="flex centro">
            <form method="post" name="formUsuario" action="codigos/salvarUsuario.php" enctype="multipart/form-data">
                <H2>Cadastro de Usúario</H2>
                <table>
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
                        <th> Primeiro Nome: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nome" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Segundo Nome: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="sobreNome" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Email: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Crie um Usuário: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="usuario" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Crie uma Senha: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="senha1" size="40" required=""></td>
                    </tr>   
                    <tr>
                        <th> Repita a Senha: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="senha2" size="40" required=""></td>
                    </tr> 
                        <?php
                            if(isset($_GET["msg"])){
                                $test=$_GET["msg"];
                                echo "<tr><td>$test</td></tr>";
                            };
                        ?>
                    <tr>
                        <td><input type="submit" name="btnEnviar" value="Enviar"><input type="reset" name="btnLimpar" value="Limpar"></td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>