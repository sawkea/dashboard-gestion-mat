<?php 
session_start();
require_once 'vendor/autoload.php';
require_once('db.php');
if(empty($_SESSION['pseudo'])&& empty($_SESSION['mdp'])){
    header('Location: index.php');
}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

$sql = "SELECT reference, nom, categorie, date_achat FROM produit";
$sth = $dbh->prepare($sql);  
$sth->execute();

$resultat = $sth->fetchAll(PDO::FETCH_ASSOC); 
$intlDateFormater = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
foreach($resultat as $ligne){
    echo '<tr>';
        echo'<td>' . $ligne['id'] . '</td> ';
        echo'<td>' . $ligne['reference'] . '</td> ';
        echo'<td>' . $ligne['nom'] . '</td> ';
        echo'<td>' . $ligne['categorie'] . '</td> ';
        echo '<td>'.$intlDateFormater->format(strtotime($ligne['date_achat'])).'</td>';
        echo '<td><a class="btn btn-outline-success marge-d pos-r" href="edit.php?edit=1&id='.$ligne['id'].'"><i class="fas fa-edit"></i></a></td>';
        echo '<td><a class="btn btn-outline-danger btn_delete pos-r" href="delete.php?id='.$ligne['id'].'" ><i class="fas fa-trash-alt"></i></a></td>';
    echo '</tr>';
}


$template = $twig->load('pages/listing.html.twig');
echo $template->render(array(
    'id' => '1',
    'reference' => 'RH7221WO',
    'nom' => 'ROWENTA X-PERT 160',
    'categorie' => 1,
    'date_achat' => 2020-07-05,
));