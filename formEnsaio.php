<!DOCTYPE html>
<head lang="pt-br">
    <title>Marcar Ensaio</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
    <header>
        <nav><a class="bt"id="logo"href="index.html">PhotoHere</a></nav>
    </header>
    <main>
        <section class="flex" id="s1">
            <form method="post" name="formEnsaio" action="codigos/salvarEnsaio.php" enctype="multipart/form-data">
                <H2>Criar Ensaio</H2>
                <table>
                    <tr>
                        <th> Nome do Cliente: </th>
                    </tr>
                    <tr>
                        <td><input type="text" name="nomeCliente" size="40" required=""></td>
                    </tr>
                    <tr>
                        <th> Data do Ensaio: </th>
                    </tr>
                    <tr>
                        <td><input type="Date" name="dtEnsaio" required=""></td>
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