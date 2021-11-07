<?php
    function inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha1, $email){
        $sqlCliente = "INSERT INTO cliente(usuario, senha) VALUES('$usuario', '$senha1')";
        mysqli_query($conexao, $sqlCliente);
    };
    function clienteExiste($conexao, $cliente){
        $sql = "SELECT * FROM cliente WHERE usuario = '$cliente'";
        $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        if (mysqli_fetch_assoc($resultado)){
            return true;
        } else {
            return false;
        }
    }
    function loginCliente($conexao, $login, $senha){
        $sql = "SELECT * FROM cliente WHERE usuario = '$login' AND senha = '$senha'";
        $res =  mysqli_query($conexao, $sql);
        $registro = mysqli_fetch_assoc($res);
        return $registro;
    }
?>