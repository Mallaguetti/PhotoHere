<!DOCTYPE html>
<head lang="pt-br">
    <title>Meu Perfil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.html">PhotoHere</a>
            <a class="bt cab" href="editarPerfil.php">Editar Perfil</a>
            <a class="bt cab" href="formEnsaio.php">Criar ensaio</a>
            <a href="formLogin.php"><img src="imagens/perfil.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <section id="s1" class="flex">
            <form method="post" name="formLogin" action="codigos/#" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th> Cep: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="cep" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Instagram: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="instagram" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Facebook: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="facebook" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> WhathsApp: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="whathsApp" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Apresentação breve: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="apresentação" size="40" required=""></td>
                    </tr>     
                    <tr>
                        <td><input type="submit" name="btnEnviar" value="Salvar Perfil"></td>
                    </tr>
                </table>
            </form>
        </section>
    </main>
</body>