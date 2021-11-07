<?php
    function inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha){
        $sqlCliente = "INSERT INTO cliente(nome, sobreNome, usuario, senha) VALUES('$nome','$sobreNome','$usuario', '$senha')";
        mysqli_query($conexao, $sqlCliente);
    };
    function clienteExiste($conexao, $usuario){
        $sql = "SELECT * FROM cliente WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        if (mysqli_fetch_assoc($resultado)){
            return true;
        } else {
            return false;
        };
    };
    function loginCliente($conexao, $usuario, $senha){
        $sql = "SELECT * FROM cliente WHERE usuario = '$usuario' AND senha = '$senha'";
        $res =  mysqli_query($conexao, $sql);
        $registro = mysqli_fetch_assoc($res);
        return $registro;
    };
?>