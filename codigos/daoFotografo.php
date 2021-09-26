<?php
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