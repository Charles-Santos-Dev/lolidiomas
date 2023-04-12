<?php

use Src\Controller\Structure;
require_once '../vendor/autoload.php';

$structure = new Structure();

$structure->setStructure('Blog', 'blog');
echo $structure->getHeader();

?>

<div class="blog_content">
    <h3>Blog</h3>
</div>

<?php

echo $structure->getFooter();

