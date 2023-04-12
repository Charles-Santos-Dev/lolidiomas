<?php

use Src\Controller\Structure;
use Src\Handller\UrlHandller;
require_once '../../vendor/autoload.php';

$baseDir = new UrlHandller();
$structure = new Structure();
$structure->setStructure('Portal Adm', 'portal_adm');

if($_SESSION['tipo'] === 'adm'){
    echo $structure->getHeader();

    ?>

    <div class="portal_adm_content portal">
        <h3>Portal adm</h3>
        <a href="logout.php">Sair</a>
    </div>

    <?php
    echo $structure->getFooter();

} else if($_SESSION['tipo'] === 'aluno'){
    $url = $baseDir->getUrl('access/portal/portalaluno');
    header('location: ' . $url);
} else {
    $url = $baseDir->getUrl();
    header('location: ' . $url);
}