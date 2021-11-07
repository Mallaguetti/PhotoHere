<?php
    session_start();
    if (isset($_SESSION["loginSessao"])) {
        $sessaoExiste = true;
        $isFotografo = $_SESSION["isFotografo"];
        $nomeSessao = $_SESSION["nomeSessao"];
    } else {
        $sessaoExiste = false;
    };
    function loginRequerido(){
        if (!isset($_SESSION["loginSessao"])){
            header("Location:formLogin.php");
        };
    };
?>