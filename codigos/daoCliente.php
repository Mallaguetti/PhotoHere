<?php
    function inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha1, $email){
        $sqlCliente = "INSERT INTO cliente(nome, sobreNome, usuario, senha, email) VALUES('$nome', '$sobreNome', '$usuario', '$senha1', '$email')";
        mysqli_query($conexao, $sqlCliente);
    };
?>