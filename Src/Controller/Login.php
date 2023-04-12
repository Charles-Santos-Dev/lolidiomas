<?php

namespace Src\Controller;
require_once '../../vendor/autoload.php';
use Src\Model\Aluno;
use Src\Handller\UrlHandller;


$email    = $_POST["txtemail"];
$password = $_POST["txtsenha"];
$user     = new Aluno();
$baseDir  = new UrlHandller();

$logged = $user->getAccess($email, $password);
session_start();

if(isset($logged)){
    if($logged->situacao === 'ATIVO'){

        $_SESSION['nome']  = $logged->nome;
        $_SESSION['senha'] = $logged->senha;
        $_SESSION['tipo']  = $logged->tipo;

        if ($logged->tipo === 'adm'){
            $url = $baseDir->getUrl("access/portal/portaladm");
        } else if ($logged->tipo === 'aluno'){
            $url = $baseDir->getUrl('access/portal/portalaluno');
        }

        $userLogged = (object) ['url' => $url, 'logado' => true, 'name' => $logged->nome, 'email' => $logged->email];
        $userJSON = json_encode($userLogged);
        echo($userJSON);
    }
} else {

    $url = $baseDir->getUrl();
    $userLogged = (object) ['url' => $url, 'logado' => false];
    $userJSON = json_encode($userLogged);
    echo($userJSON);
    session_destroy();
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    header('location: ' . $baseDir->getUrl());
}