<?php

namespace Src\Handller;
use Src\Handller\UrlHandller;

class OpenDataBase{
    public function getData(){
        $servidor = 'localhost:3306';
        $usuario  = 'ethinkers';
        $senha    = '1qazZAQ!';
        $banco    = 'lolidiomas';

        // Conecta-se ao banco de dados MySQL
        $mysqli = new \mysqli($servidor, $usuario, $senha, $banco);

        $mysqli->set_charset("utf8");

        // Caso algo tenha dado errado, exibe uma mensagem de erro
        if (mysqli_connect_errno()){
            trigger_error(mysqli_connect_error());
        }
        return $mysqli;
    }
}