<?php

use Src\Handller\UrlHandller;
require_once '../../vendor/autoload.php';

session_start();
session_destroy();

$baseDir = new UrlHandller();
$url = $baseDir->getUrl();
header('location: ' . $url);