<?php
require_once "codigos/validarSessao.php";
echo "<a class='bt cab'id='logo'href='index.php'><img src='imagens/LOGO.jpg' alt='PhotoHere'></a>";
if($sessaoExiste){
    if($isFotografo){
        if ($foto != null) {
            echo ("<a id='fotoPerfil' href='perfilFotografo.php?msg=editarFoto'><img src='data:imagem/IMG_JPG;base64,$fotoPerfil'></a>");
        } else {
            echo ("<a id='fotoPerfil' href='perfilFotografo.php?msg=editarFoto'><img src='imagens/perfil.jpg'></a>");
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