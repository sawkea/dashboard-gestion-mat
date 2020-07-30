<?php 
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);



$template = $twig->load('pages/edit.html.twig');
echo $template->render();
