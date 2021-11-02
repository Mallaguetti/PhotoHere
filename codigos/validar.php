<?php
    session_start();
    if (isset($_SESSION["loginSessao"])) {
        $nomeSessao = $_SESSION["nomeSessao"];
    };
?>