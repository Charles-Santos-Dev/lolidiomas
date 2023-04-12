<?php

require_once 'vendor/autoload.php';
use Src\Controller\Structure;
use Src\Model\Model;

$structure = new Structure();
$CmsHome   = new Model();
$structure->setStructure();

$structure->getHeader();

$CmsHome->getCms('home');

$structure->getFooter();