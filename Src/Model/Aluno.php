<?php

namespace Src\Model;
use Src\Handller\OpenDataBase;

class Aluno extends Model{
    public function getAccess($email, $password){
        $exec = "select * from cadastro where email = '" . $email . "' and senha = " . $password;

        return mysqli_fetch_object($this->setMysqli($exec));
    }
}