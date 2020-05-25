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
    <h1 class="navbar-brand"> Profil </h1> 
    </nav>
<div class="row ">  
    

    <div class="col-sm-6"> 
        <div class="col-sm-12">
            <div class="form-group">
                    <h2><?= $_SESSION['nom'].' '.$_SESSION['prenom'] ?></h2>
                </div>
            </div>
    
        <div class="form-group">
            <ul>
                <li> Nom :
            <div id="nom" type="texte" required class="form-control" name="nom" ><?= $_SESSION['nom'] ?></div>
                </li>
                <li> Prenom :
            <div id="prenom" type="texte" required class="form-control" name="prenom" ><?= $_SESSION['prenom'] ?></div>
                </li>
                <li> Numero de téléphone :
            <div id="numtel" type="texte" required class="form-control" name="numtel" ><?= $_SESSION['numtel'] ?></div>
                </li>
                <li> Adresse :
            <div id="adresse" type="texte" required class="form-control" name="adresse" ><?= $_SESSION['adresse'] ?></div>
                </li>
                <li> Ville :
            <div id="ville" type="texte" required class="form-control" name="ville" ><?= $_SESSION['ville'] ?></div>
                </li>
                <li> Code Postal :
            <div id="cp" type="texte" required class="form-control" name="cp"><?= $_SESSION['cp'] ?></div>
                </li>
                <li> Adresse mail :
            <div id="mail" type="email" required class="form-control" name="mail"><?= $_SESSION['mail'] ?></div>
                </li>
                <li> Mot de passe :
            <div id="mdp" type="password" required class="form-control" name="mdp"><?= $_SESSION['mdp'] ?></div>
                </li>
                <li> Praticien :
                
                    <div>Dr. <?= $medecin->getNom().' '.$medecin->getPrenom() ?></div>
                    <div> Mail :  <?= $medecin->getMail() ?></div>
                </li>
            </ul>
            
        </div>
        <form action='/phpMed/connexion/patient/calendrier'>
            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >RDV</button>
                </div>
            </div>
        </form>   
            
    </div>
</div>


<?php
require_once 'connexion/inc/footer.php';
?>

