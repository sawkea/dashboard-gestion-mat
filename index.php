<?php 
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

echo('coucou');

$template = $twig->load('base.html.twig');
echo $template->render();

