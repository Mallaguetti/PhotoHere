<!DOCTYPE html>
<head lang="pt-br">
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
    <main>
        <section class="flex">
            <form method="post" name="formLogin" action="codigos/#" enctype="multipart/form-data">
                <H2>Login</H2>
                <table>
                    <tr>
                        <th> Usuário: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtNome" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Senha: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtNome" size="40" required=""></td>
                    </tr>     
                    <tr>
                        <td><input type="submit" name="btnEnviar" value="Enviar"><input type="reset" name="btnLimpar" value="Limpar"></td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>