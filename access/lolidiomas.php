<?php

use Src\Controller\Structure;
require_once '../vendor/autoload.php';

$structure = new Structure();

$structure->setStructure('Sobre', 'sobre');
echo $structure->getHeader();

?>

<div class="sobre_content">
    <h3>Sobre</h3>
</div>

<?php

echo $structure->getFooter();

