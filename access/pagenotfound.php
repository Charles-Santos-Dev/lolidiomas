<?php

use Src\Controller\Structure;
require_once '../vendor/autoload.php';

$structure = new Structure();

$structure->setStructure('Página não encontrada', 'not-found');
echo $structure->getHeader();

?>

<div class="page_notfound">
    <h3>Página não encontrada</h3>
    <p>A página que você buscou não foi encontrada.</p>
    <a href="/">Voltar a home</a>
</div>

<?php

echo $structure->getFooter();

