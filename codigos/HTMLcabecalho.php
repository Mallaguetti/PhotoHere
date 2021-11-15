<?php
require_once "codigos/validarSessao.php";
if($sessaoExiste){
    echo "<a class='bt cab' href='perfilCliente.php'>Meu perfil</a>";
    echo "<a class='bt cab' href='codigos/logout.php'>Sair</a>";
}else{
    $pag = basename($_SERVER['PHP_SELF'],'.php');
    echo "<a class='bt cab'id='login'href='formLogin.php?pag=$pag.php'>Login</a>";
    echo "<a class='bt cab'href='formCadUsuario.php'>Cadastrar</a>";
}
?>