<?php
    require_once "codigos/validarSessao.php";
    loginRequerido();
    if (isset($_GET["id"])){
        $idCliente = $_SESSION["idSessao"];
        $idFotografo = $_GET["id"];
    } else {
        header("Location:encontrarFotografo.php");
    }
    if (isset($_GET["editar"])){
        $editar = $_GET["editar"];
        if (isset($_GET["ensaio"])){
            $ensaio = $_GET["ensaio"];
            $local = "perfilCliente.php";
        } else {
            $ensaio = null;
            $local = "encontrarFotografo.php";
        };
    } else {
        header("Location:encontrarFotografo.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PhotoHere</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagens/LOGO.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="estilos/_principal.css">
    <link rel="stylesheet" type="text/css" href="estilos/perfil.css">
    <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
    <link rel="stylesheet" type="text/css" href="estilos/individuais/perfilCliente.css">
</head>
<body>
    <header>
        <nav>
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
            <input type="hidden" name="editar" value="<?php echo $editar?>">
            <input type="hidden" name="ensaio" value="<?php echo $ensaio?>">
            <div>
                <input type="submit" name="btnEnviar" value="Confirmar">
                <a href="<?php echo $local ?>">Cancelar</a>
            </div>           
        </form>
    </section>
</body>
</html>