<?php
    function inserirFotografo($conexao, $nome, $sobreNome, $usuario, $senha){
        $sqlFotografo = "INSERT INTO fotografo(nome, sobreNome, usuario, senha) VALUES('$nome','$sobreNome','$usuario', '$senha')";
        mysqli_query($conexao, $sqlFotografo) or die (mysqli_error($conexao));
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
        $res =  mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        $registro = mysqli_fetch_assoc($res);
        return $registro;
    };

    function pesquisarFotografo($conexao, $tipo, $texto){
        switch($tipo){
            case 1:
                $sql = "SELECT * FROM fotografo WHERE nome LIKE '$texto%'";
                break;
            case 2:
                $sql = "SELECT * FROM fotografo WHERE CEP LIKE '$texto%'";
                break;
            case 3:
                $sql = "SELECT * FROM fotografo WHERE idFotografo = '$texto'";
                break;
        };
        $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        return $resultado;
    };

    function salvarPerfil($conexao, $id, $cep, $instagram, $facebook, $celular, $apresentacao){
        
        $sql = "UPDATE fotografo SET 
        cep = '$cep',
        instagram = '$instagram',
        facebook = '$facebook',
        celular = '$celular',
        apresentacao = '$apresentacao'
        WHERE idFotografo = $id";

        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    };
?>