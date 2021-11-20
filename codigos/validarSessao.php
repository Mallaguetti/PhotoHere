<?php
    session_start();
    if (isset($_SESSION["idSessao"])) {
        $sessaoExiste = true;
        $isFotografo = $_SESSION["isFotografo"];
        
    } else {
        $sessaoExiste = false;
    };
    function loginRequerido(){
        if (!isset($_SESSION["idSessao"])){
            header("Location:formLogin.php");
        };
    };
?>