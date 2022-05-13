<?php
    $DB_SERVER = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'upet';

    //parametros de conexão com o mysql
    $link = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if($link == false){
       die ("ERRO: não foi possivel realizar a conexao com o BD");
    }
?>