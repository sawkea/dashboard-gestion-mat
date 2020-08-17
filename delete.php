<?php
session_start();

require_once('db.php');

if(empty($_SESSION['pseudo'])&& empty($_SESSION['mdp'])){
    header('Location: index.php');
} 
if(isset($_GET['id'])){
    $sql = 'delete from produit where id= :id';
    $sth = $dbh->prepare($sql);
    $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $sth->execute();
}
header('Location: listing.php');
?>