# dashboard-gestion-mat
Création d'un dashboard sécurisé avec gestion du matériel - Travail en binôme (FRONT / BACK) avec LisaDevoghelaere

## Création du modèle de données sur papier
Ébauche sur papier du modèle de données avec les différentes tables et relations
photo

## Trouver un Nom et logo pour le projet
DGMA "Dashboard Gestion Matériel Achat"

## FRONT - Sonia

### Création sur papier des différentes pages à créer
photo

### Préparation des fichiers de bases avec twig
1. mise en place de twig avec composer et vendor
2. Création de la page index.php

### dossier templates
Création des pages
* base.html.twig
* index.html.twig
* listing.html.twig
* fiche-materiel.html.twig
* ajout.html.twig

ex: page ajout.html.twig
    {% extends "base.html.twig" %}
    {% block title %}Listing{% endblock title %}
    {% block content %}
        <h1>Ajout d'un nouveau matériel</h1>
    {% endblock content %}

### dossier php
Création des pages
* ajout.php
* listing.php
* fiche-materiel.php

ex: page ajout.php
    <?php 
    require_once 'vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);
    $template = $twig->load('pages/ajout.html.twig');
    echo $template->render();

### dossier js
* création de la page script.js

### Relation entre les pages 
* Effectuer les chemins de relations entre fichiers twig et php 

ex: 
    $template = $twig->load('pages/ajout.html.twig');
    echo $template->render();

### Sass
Mise en place de sass avec fichier style.scss

## Création du form login
* Création du formulaire de login en HTML avec style 
* Création du logo

## Création de la page listing
* Création d'un formulaire qui va lister les achats de matériels dans la société DGMA

## Création de la page fiche-produit
* Création du formulaire 
* ajout des styles et responsive ok
-------------------------------------------
## BACK - Lisa


