<?php

namespace Src\Model;
use Src\Handller\OpenDataBase;

class Model extends OpenDataBase{
    public function setMysqli($exec){

        return $this->getData()->query($exec);
    }
    public function getCms($page){
        $exec = "select * from CmsLayout where page = '" . $page . "' and status = true";

        echo mysqli_fetch_object($this->setMysqli($exec))->cms;
    }
    public function getCategorys($baseDir){
        $exec     = "select * from Categorias where status = 'ATIVO'";
        $listNave = '<li class="lis_menu"><a href="' . $baseDir . '">Home</a></li>';

        $query = $this->getData()->query($exec);
            while ($dados = mysqli_fetch_object($query)){
                $listNave_sub = '';
                $exec_sub  = "select * from Subcategorias where status = 'ATIVO' and categoryid = " . $dados->id;
                $query_sub = $this->getData()->query($exec_sub);
                    while ($dados_sub = mysqli_fetch_object($query_sub)){
                        $nameNoSpace_sub = preg_replace("/\s{1,9}/", "", $dados_sub->nome);
                        $listNave_sub .= '<li class="list_sub_menu"><a href="' . $baseDir . 'access/sub/' . strtolower($nameNoSpace_sub) . '">' . $dados_sub->nome . '</a></li>';
                    }
                    $query_sub->free();

                    $nameNoSpace = preg_replace("/\s{1,9}/", "", $dados->nome);
                    if(strlen($listNave_sub) > 0){
                        $listNave .= '<li class="list_menu"><a href="' . $baseDir . 'access/' . strtolower($nameNoSpace) . '">' . $dados->nome . '</a> ' . '<ul class="nav_sub_menu">' . $listNave_sub . '</ul></li>';
                    } else {
                        $listNave .= '<li class="list_menu"><a href="' . $baseDir . 'access/' . strtolower($nameNoSpace) . '">' . $dados->nome . '</a></li>';
                    }
            }
        return $listNave;
        $query->free();
    }
}