<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// session_start(); 
// require_once 'vendor/autoload.php';
// // require_once('db.php');
// // if(empty($_SESSION['pseudo'])){
// //     header('Location: index.php');
// // }
// function categorie(){
//     require('db.php');
//     $sql = 'SELECT nom FROM categorie';
//     $req = $dbh -> query($sql);
//     return $req;
// }



// $loader = new \Twig\Loader\FilesystemLoader('templates');
// $twig = new \Twig\Environment($loader, [
//     'cache' => false,
// ]);

// $template = $twig->load('pages/edit.html.twig');
// echo $template->render(array(
//         'categorie' => categorie()
// ));