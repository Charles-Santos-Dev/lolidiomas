<?php

use Src\Controller\Structure;
require_once '../vendor/autoload.php';

$structure = new Structure();

$structure->setStructure('Matricule-se', 'matricula');
echo $structure->getHeader();

?>

<div class="matricula_content">
    <h3>Matricula</h3>
</div>

<?php

echo $structure->getFooter();

