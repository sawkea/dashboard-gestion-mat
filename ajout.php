<?php
session_start(); 
require_once 'vendor/autoload.php';
require_once('db.php');
if(empty($_SESSION['pseudo'])){
    header('Location: index.php');
}
$id = '';
$nom = '';
$reference = '';
$categorie_id = '';
$date_achat  = '';
$fin_garantie = '';
$prix = '';
$conseils_entretien = '';
$facture = '';
$manuel_utilisation = '';
$boutique = '';
$adresse = '';
$ville = '';
$cp = '';
$url = '';

$error = false;

// Vérifier si on demande on passe en mode edit et non en mode Ajout
if(isset($_POST['id'])&& isset($_POST['edit'])){
    $sql = "SELECT id, nom, reference, categorie_id, date_achat, fin_garantie, prix, conseils_entretien, facture, manuel_utilisation, boutique, adresse, ville, cp, url FROM produit";
    $sth = $dbh->prepare($sql);
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
    $categorie_id = $data['categorie_id'];
    $date_achat  = $data['date_achat'];
    $fin_garantie = $data['fin_garantie'];
    $prix = $data['prix'];
    $conseils_entretien = $data['conseils_entretien'];
    $facture = $data['facture'];
    $manuel_utilisation = $data['manuel_utilisation'];
    $boutique = $data['boutique'];
    $adresse = $data['adresse'];
    $url = $data['url'];
    $id = htmlentities($_POST['id']);
}
//On va vérifier si on reçoit le formulaire (s'il est soumis)
if(count($_POST)>0){

    if(strlen(trim($_POST['nom'])) !== 0){ //"si en retirant les espace on a plus d'un caractère"
        $nom = trim($_POST['nom']);
    }else{
        $error= true;
    }
    if(strlen(trim($_POST['categorie_id'])) !== 0){ 
        $categorie_id = trim($_POST['categorie_id']);
    }else{
        $error= true;
    }
    if(strlen(trim($_POST['date_achat'])) !== 0){ 
        $date_achat = trim($_POST['date_achat']);
    }else{
        $error= true;
    }
    if(strlen(trim($_POST['fin_garantie'])) !== 0){ 
        $fin_garantie = trim($_POST['fin_garantie']);
    }else{
        $error= true;
    }
    if(strlen(trim($_POST['prix'])) !== 0){ 
        $prix = trim($_POST['prix']);
    }else{
        $error= true;
    }
    if(strlen(trim($_POST['conseils_entretien'])) !== 0){ 
        $conseils_entretien = trim($_POST['conseils_entretien']);
    }else{
        $error= true;
    }
    //les champs en "null"
    $facture = trim($_POST['facture']);
    $manuel_utilisation = trim($_POST['manuel_utilisation']);
    $boutique = trim($_POST['boutique']);
    $adresse = trim($_POST['adresse']);
    $ville = trim($_POST['ville']);
    $cp = trim($_POST['cp']);
    $url = trim($_POST['url']);

    if(isset($_POST['edit']) && isset($_POST['id'])){
        $id = htmlentities($_POST['id']);
    }
    //Si pas d'erreur on insère dans la base de données
    if($error===false){
        if(isset($_POST['edit']) && isset($_POST['id'])){
            $sql = "update produit set id=:id, nom=:nom, reference=:reference, categorie_id=:categorie_id, date_achat=:date_achat, fin_garantie=:fin_garantie, prix=:prix, conseils_entretien=:conseils_entretien, facture=:facture, manuel_utilisation=:manuel_utilisation, boutique=:boutique, adresse=:adresse, ville=:ville, cp=:cp, url=:url";
        }else{
            $sql = "INSERT INTO produit(id, nom, reference, categorie_id, date_achat, fin_garantie, prix, conseils_entretien, facture, manuel_utilisation, boutique, adresse, ville, cp, url) VALUES(:id, :nom, :reference, :categorie_id, :date_achat, :fin_garantie, :prix, :conseils_entretien, :facture, :manuel_utilisation, :boutique, :adresse, :ville, :cp, :url)";
        }

        $sth = $dbh->prepare($sql);

        //ci-dessous ces fonctions protègent notre formulaire de toute injection de sql ou html
        //bindParam pour les varchar
        $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
        $sth->bindParam(':reference', $reference, PDO::PARAM_STR);
        $sth->bindParam(':categorie_id', $categorie_id, PDO::PARAM_STR);
        $sth->bindParam(':conseils_entretien', $conseils_entretien, PDO::PARAM_STR);
        $sth->bindParam(':facture', $facture, PDO::PARAM_STR);
        $sth->bindParam(':manuel_utilisation', $manuel_utilisation, PDO::PARAM_STR);
        $sth->bindParam(':boutique', $boutique, PDO::PARAM_STR);
        $sth->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $sth->bindParam(':ville', $ville, PDO::PARAM_STR);
        $sth->bindParam(':cp', $cp, PDO::PARAM_STR);
        $sth->bindParam(':url', $url, PDO::PARAM_STR);

        //date, INT, FLOAT
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        $sth->bindValue(':date_achat', strftime("%Y-%m-%d",strtotime($date_achat)), PDO::PARAM_STR);
        $sth->bindValue(':fin_garantie', strftime("%Y-%m-%d",strtotime($fin_garantie)), PDO::PARAM_STR);
        $sth->bindValue(':prix', $prix, PDO::PARAM_STR);
        if(isset($_POST['edit']) && isset($_POST['id'])){
            $sth->bindParam('id', $id, PDO::PARAM_INT);
        }
        $sth->execute();
        header('Location: listing.php');

    }
}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);


$template = $twig->load('pages/edit.html.twig');
echo $template->render(array(
    'id' => $id,
    'nom' => $nom,
    'reference' => $reference,
    'categorie_id' => $categorie_id,
    'date_achat' => $date_achat,
    'fin_garantie' => $fin_garantie,
    'prix' => $prix,
    'conseils_entretien' => $conseils_entretien,
    'facture' => $facture,
    'manuel_utilisation' => $manuel_utilisation,
    'boutique' => $boutique,
    'adresse' => $adresse,
    'ville' => $ville,
    'cp' => $cp,
    'url' => $url
));