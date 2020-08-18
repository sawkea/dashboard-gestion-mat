<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start(); 
require_once 'vendor/autoload.php';
require_once('db.php');
if(empty($_SESSION['pseudo'])){
    header('Location: index.php');
}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

$template = $twig->load('pages/add-categorie.html.twig');
echo $template->render();