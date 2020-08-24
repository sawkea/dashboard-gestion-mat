<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start(); 
require_once 'vendor/autoload.php';
require_once('db.php');
if(empty($_SESSION['pseudo'])){
    header('Location: index.php');
}
$new_categorie='';
$error = false;
if(isset($_POST['new-categorie']) && !empty($_POST['new-categorie'])){
    if(strlen(trim($_POST['new-categorie'])) !== 0){ 
        $new_categorie = trim($_POST['new-categorie']);
        $sql = "INSERT INTO categorie (nom) VALUES (:new_categorie)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':new_categorie', $new_categorie, PDO::PARAM_STR);
        $sth->execute();
    
        header('Location: listing.php');

    }else{
        $error= true;
        header('Location: listing.php');

    }

}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

$template = $twig->load('pages/add-categorie.html.twig');
echo $template->render(array(
    'new-categorie' => $new_categorie
));