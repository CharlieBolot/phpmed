<?php
require_once 'connexion/inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
//require 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'connexion.php';
$medecinDAO = new medecinDAO($pdo);
$id = $_SESSION['idprat'];
$medecin = $medecinDAO->getmedecin($id);
?>

    <nav class="navbar navbar-dark bg-primary mb-3">
        <h1 class="navbar-brand"> Calendrier </h1> 
    </nav>
