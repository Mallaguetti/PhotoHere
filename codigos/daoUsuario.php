<?php
    function inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha1, $email){
        $sqlCliente = "INSERT INTO cliente(nome, sobreNome, usuario, senha, email) VALUES('$nome', '$sobreNome', '$usuario', '$senha1', '$email')";
        mysqli_query($conexao, $sqlCliente);
    };
    function inserirFotografo($conexao, $nome, $sobreNome, $usuario, $senha1, $email){
        $sqlFotografo = "INSERT INTO fotografo(nome, sobreNome, usuario, senha, email) VALUES('$nome', '$sobreNome', '$usuario', '$senha1', '$email')";
        mysqli_query($conexao, $sqlFotografo);
    };
?>