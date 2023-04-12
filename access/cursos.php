<?php

use Src\Controller\Structure;
require_once '../vendor/autoload.php';

$structure = new Structure();

$structure->setStructure('Cursos', 'cursos');
echo $structure->getHeader();

?>

<div class="cursos_content">
    <h3>Cursos</h3>
</div>

<?php

echo $structure->getFooter();

