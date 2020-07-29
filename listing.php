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
    $sql = "SELECT id, reference, nom, categorie_id, date_achat FROM produit";
    $sth = $dbh->prepare($sql);  
    $sth->execute();
    return $sth;
}

 
$intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);


$template = $twig->load('pages/listing.html.twig');
echo $template->render(array(
    'resultat' => liste_produit(),
));