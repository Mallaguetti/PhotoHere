<?php
require_once "conectar.php";
require_once "daoEnsaio.php";

$idEnsaio = $_POST["idEnsaio"];
$nota = $_POST["nota"];

avaliarEnsaio($conexao, $idEnsaio, $nota);
header("Location:../perfilClienteVerFotos.php?idEnsaio=$idEnsaio");

?>