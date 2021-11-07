<?php
    function inserirFotografo($conexao, $nome, $sobreNome, $usuario, $senha){
        $sqlFotografo = "INSERT INTO fotografo(nome, sobreNome, usuario, senha) VALUES('$nome','$sobreNome','$usuario', '$senha')";
        mysqli_query($conexao, $sqlFotografo);
    };
    function fotografoExiste($conexao, $usuario){
        $sql = "SELECT * FROM fotografo WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        if (mysqli_fetch_assoc($resultado)){
            return true;
        } else {
            return false;
        };
    };
    function loginFotografo($conexao, $usuario, $senha){
        $sql = "SELECT * FROM fotografo WHERE usuario = '$usuario' AND senha = '$senha'";
        $res =  mysqli_query($conexao, $sql);
        $registro = mysqli_fetch_assoc($res);
        return $registro;
    };
    function salvarPerfil(){
        
    };
    function pesquisarFotografo($conexao, $tipo, $texto){
        switch($tipo){
            case 1:
                $sql = "SELECT * FROM fotografo WHERE nome LIKE '$texto%'";
                break;
            case 2:
                $sql = "SELECT * FROM fotografo WHERE CEP LIKE '$texto%'";
                break;
        };
        $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        return $resultado;
    };
?>