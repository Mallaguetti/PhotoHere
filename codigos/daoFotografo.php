<?php
    function inserirFotografo($conexao, $nome, $sobreNome, $usuario, $senha1, $email){
        $sqlFotografo = "INSERT INTO fotografo(nome, sobreNome, usuario, senha, email) VALUES('$nome', '$sobreNome', '$usuario', '$senha1', '$email')";
        mysqli_query($conexao, $sqlFotografo);
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