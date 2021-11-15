<?php
    function inserirCliente($conexao, $nome, $sobreNome, $usuario, $senha){
        $sqlCliente = "INSERT INTO cliente(nome, sobreNome, usuario, senha) VALUES('$nome','$sobreNome','$usuario', '$senha')";
        mysqli_query($conexao, $sqlCliente) or die (mysqli_error($conexao));
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
        $res =  mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        return mysqli_fetch_assoc($res);
    };
    function pesquisarCliente($conexao, $tipo, $texto){
        switch($tipo){
            case 0:
                $sql = "SELECT * FROM cliente WHERE idCliente = '$texto'";
                break;
            case 1:
                $sql = "SELECT * FROM cliente WHERE nome LIKE '$texto%'";
                break;
            case 2:
                $sql = "SELECT * FROM cliente WHERE CEP LIKE '$texto%'";
                break;
        };
        $res = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        return $res;
    };
?>