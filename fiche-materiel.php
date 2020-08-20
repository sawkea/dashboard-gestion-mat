<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start(); 
require_once 'vendor/autoload.php';
require_once('db.php');
if(empty($_SESSION['pseudo'])){
    header('Location: index.php');
}
//initialisation des variables
$id = '';
$nom = '';
$reference = '';
$categorie_id = '';
$date_achat  = '';
$fin_garantie = '';
$prix = '';
$conseils_entretien = '';
$ticket = '';
$manuel_utilisation = '';
$boutique = '';
$adresse = '';
$ville = '';
$cp = '';
$url = '';

$error = false;

//condition pour savoir si l'on a bien reçu l'id
if(isset($_GET['id'])){
    $sql = "SELECT p.id, p.reference, p.nom, c.nom AS categorie, p.prix, p.date_achat, p.fin_garantie, p.conseils_entretien, p.ticket, p.manuel_utilisation, p.url, p.adresse, p.ville, p.cp FROM produit AS p INNER JOIN categorie AS c ON p.categorie_id = c.id";

    $sth = $dbh->prepare($sql);
    $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        
    $sth->execute();
    $data = $sth->fetch(PDO::FETCH_ASSOC);
    //Condition pour sécuriser le formulaire 
    //si pas de résultat de la requête
    //data est booléen
    if(gettype($data) === "boolean"){
        header('Location: listing.php');
        exit;
    }
    $nom = $data['nom'];
    $reference = $data['reference'];
    $categorie_id = $data['categorie'];
    $date_achat  = $data['date_achat'];
    $fin_garantie = $data['fin_garantie'];
    $prix = $data['prix'];
    $conseils_entretien = $data['conseils_entretien'];
    $ticket = $data['ticket'];
    $manuel_utilisation = $data['manuel_utilisation'];
    $adresse = $data['adresse'];
    $ville = $data['ville'];
    $cp = $data['cp'];
    $url = $data['url'];
    $id = htmlentities($_GET['id']);
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
