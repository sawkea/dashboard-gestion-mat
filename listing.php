<?php 
session_start();
require_once 'vendor/autoload.php';

if(empty($_SESSION['pseudo'])&& empty($_SESSION['mdp'])){
    header('Location: index.php');
}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

function liste_produit(){
    require('db.php');
    $sql = "SELECT p.id, p.reference, p.nom AS marque, c.nom AS categorie, p.date_achat FROM produit AS p INNER JOIN categorie AS c ON p.categorie_id = c.id";
    $sth = $dbh->prepare($sql);  
    $sth->execute();
    return $sth;
}



$template = $twig->load('pages/listing.html.twig');
echo $template->render(array(
    'resultat' => liste_produit(),
));