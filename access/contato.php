<?php

use Src\Controller\Structure;
require_once '../vendor/autoload.php';

$structure = new Structure();

$structure->setStructure('Entre em contato', 'contact');
echo $structure->getHeader();

?>

<div class="contact_content">
    <h3>Contato</h3>
</div>

<?php

echo $structure->getFooter();

