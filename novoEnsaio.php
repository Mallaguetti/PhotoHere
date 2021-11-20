<?php
    require_once "codigos/validarSessao.php";
    if (isset($_GET["id"])){
        $idFotografo = $_GET["id"];
        $idCliente = $_SESSION["idSessao"];
    } else {
        header("Location:encontrarFotografo.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/perfilCliente.css">
</head>
<body>
    <header>
        <nav>
            <a class="bt"id="logo"href="index.php">PhotoHere</a>
            <?php require_once "codigos/HTMLcabecalho.php";?>
        </nav>
    </header>
    <section class="flex topo"id="s1">
        <form method="post" name="formLogin" action="codigos/salvarEnsaio.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div>
                <table>
                    <tr>
                        <th> Data </th>
                    </tr>
                    <tr>
                        <td><input type="date" name="data" required=""></td>
                    </tr>
                </table>
            </div>
            <div>
                <table>
                    <tr>
                        <th> Hora: </th>
                    </tr>
                    <tr>
                        <td><input type="time" name="hora" required=""></td>
                    </tr>
                </table>
            </div>
            <input type="hidden" name="cliente" value="<?php echo $idCliente?>">
            <input type="hidden" name="fotografo" value="<?php echo $idFotografo?>">
            <div>
                <input type="submit" name="btnEnviar" value="Solicitar Horario">
                <a href="encontrarFotografo.php">Cancelar</a>
            </div>           
        </form>
    </section>
</body>
</html>