<?php

$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '00999';
$dbName = 'formulario_curso_eng_eletrica' ;

$conexao = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName);

if($conexao->connect_errno){
    echo "Erro";
}
else {
    echo "Conexão efetuada com sucesso";

}




?>