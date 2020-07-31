<?php
session_start(); 
require_once 'vendor/autoload.php';
require_once('db.php');
$mdp = '';
$pseudo = '';
$msg = '';

if(isset($_POST['submit'])&&  !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        
    $sql="SELECT pseudo, mot_de_passe FROM login WHERE pseudo = :pseudo";
    $sth = $dbh->prepare($sql);
    $sth->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);  
    $sth->execute();
    $data = $sth->fetch();

    $pseudo = $data['pseudo'];
    $mdp = $data['mot_de_passe'];
    
    if($_POST['pseudo'] == $pseudo && $_POST['mdp'] == $mdp){
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['mdp'] = $mdp;
        header('Location: listing.php');
    }else{
        $msg = "Le nom d'utilisateur ou mot de passe est invalide";
        
    }
}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'debug' => true,
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());


$template = $twig->load('pages/index.html.twig');
echo $template->render(['message', $msg]);


