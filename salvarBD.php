<?php
    $usuarioTipo = $_POST["usuarioTipo"];
    $nome = $_POST["nome"];
    $sobreNome = $_POST["sobreNome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $senha1 = $_POST["senha1"];
    $senha2 = $_POST["senha2"];

    include_once"conect.php";

    if ($senha1==$senha2){
        if ($usuarioTipo==1) {
            $sql = "INSERT INTO cliente(nome, sobreNome, usuario, senha, email) VALUES('$nome', '$sobreNome', '$usuario', '$senha1', '$email')";
            mysqli_query($conexao, $sql);
        };
        if ($usuarioTipo==2) {
            $sql = "INSERT INTO fotografo(nome, sobreNome, usuario, senha, email) VALUES('$nome', '$sobreNome', '$usuario', '$senha1', '$email')";
            mysqli_query($conexao, $sql);
        };
    } else {
        echo "senhas não corespondem";
    };
?>