<?php

use Src\Controller\Structure;
use Src\Handller\UrlHandller;
require_once '../../vendor/autoload.php';

$baseDir = new UrlHandller();
$structure = new Structure();
$structure->setStructure('Portal do aluno', 'portal_aluno');

if($_SESSION['tipo'] === 'aluno'){
    echo $structure->getHeader();

    ?>

    <div class="portal_aluno_content portal">
        <h3>Portal aluno</h3>
        <a href="logout.php">Sair</a>
    </div>

    <?php
    echo $structure->getFooter();
} else if($_SESSION['tipo'] === 'adm'){
    $url = $baseDir->getUrl('access/portal/portaladm');
    header('location: ' . $url);
} else {
    $url = $baseDir->getUrl();
    header('location: ' . $url);
}