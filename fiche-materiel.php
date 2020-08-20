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


$template = $twig->load('pages/fiche-materiel.html.twig');
echo $template->render(array(
    'id' => $id,
    'nom' => $nom,
    'reference' => $reference,
    'categorie_id' => $categorie_id,
    'date_achat' => $date_achat,
    'fin_garantie' => $fin_garantie,
    'prix' => $prix,
    'conseils_entretien' => $conseils_entretien,
    'ticket' => $ticket,
    'manuel_utilisation' => $manuel_utilisation,
    'adresse' => $adresse,
    'ville' => $ville,
    'cp' => $cp,
    'url' => $url
));
