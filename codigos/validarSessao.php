<?php
    session_start();
    if (!isset($_SESSION["idSessao"])){
        $pag = basename($_SERVER['PHP_SELF'],'.php');
        header("Location:formLogin.php?pag=$pag.php");
    };
?>