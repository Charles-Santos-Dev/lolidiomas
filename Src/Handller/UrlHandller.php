<?php

namespace Src\Handller;
use Src\Model\Model;

class UrlHandller extends Model{
    public function getUrl($pathDir = null){
        $pathDir = ($pathDir)? '/' . $pathDir: '/';

        if(isset($_SERVER['HTTPS_HOST'])){
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }

        return $protocol . $_SERVER["SERVER_NAME"] . $pathDir;
    }
}

?>