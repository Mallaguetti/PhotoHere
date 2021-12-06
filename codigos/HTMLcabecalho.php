<?php
require_once "codigos/validarSessao.php";
echo "<a class='bt cab'id='logo'href='index.php'><img src='imagens/LOGO.jpg' alt='PhotoHere'></a>";
if($sessaoExiste){
    if($isFotografo){
        if (!(isset($fotoPerfil))){
            require_once "codigos/conectar.php";
            require_once "codigos/validarSessao.php";
            require_once "codigos/daoFotografo.php";
            $id = $_SESSION["idSessao"];
            $registro = mysqli_fetch_assoc(fotoFotografo($conexao, $id));
            $foto = $registro["fotoPerfil"];
            $fotoPerfil = base64_encode($foto);
        }
        if ($foto != null) {
            echo ("<a id='perfil' href='perfilFotografo.php'><img src='data:imagem/IMG_JPG;base64,$fotoPerfil'></a>");
        } else {
            echo ("<a id='perfil' href='perfilFotografo.php'><img src='imagens/perfil.jpg'></a>");
        }
    } else {
        echo "<a class='bt cab' href='encontrarFotografo.php'>Procurar Fotografo</a>";
    }
    echo "<a class='bt cab' href='codigos/logout.php'>Sair</a>";
}else{
    $pag = basename($_SERVER['PHP_SELF'],'.php');
    echo "<a class='bt cab'id='login'href='formLogin.php?pag=$pag.php'>Login</a>";
    echo "<a class='bt cab'href='formCadUsuario.php'>Cadastrar</a>";
}
?>