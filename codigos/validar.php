<?php
    session_start();
    if (isset($_SESSION["nomeSessao"])) {
        $nomeSessao = $_SESSION["nomeSessao"];
    } else {
        header("Location:formLogin.php");
    };
?>