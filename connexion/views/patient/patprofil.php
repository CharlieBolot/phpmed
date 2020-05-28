<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
//require 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'connexion.php';
$pdo= get_pdo();
$medecinDAO = new medecinDAO($pdo);
$id = $_SESSION['idprat'];
$medecin = $medecinDAO->getmedecin($id);
?>

<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">


        

        
            <?php $indicesServer = $_SERVER['REQUEST_URI'] ;
            $test = explode('/', $indicesServer);
            if(isset($test[6])):        
                if ( $test[6] == 'update'): ?>
                    <div class="container">
                        <div class="alert alert-success">
                        Votre profil a bien été mis à jour
                        </div>
                    </div>

                <?php endif; ?>
            <?php endif; ?>   
            

        </div>
    
<div class="row ">  

    

    

    <div class="col-sm-6"> 
        <div class="col-sm-12">
            <div class="form-group">
                    <h2><?= $_SESSION['nom'].' '.$_SESSION['prenom'] ?></h2>
                </div>
            </div>



    
        <form method="post" class="form-group" action="/phpMed/connexion/patient/profil/modif/">
            <ul>
                <li> Nom :
            <input id="nom" type="texte" required class="form-control" name="nom" value='<?= $_SESSION['nom'] ?>'>
                </li>
                <li> Prenom :
            <input id="prenom" type="texte" required class="form-control" name="prenom" value='<?= $_SESSION['prenom'] ?>'>
                </li>
                <li> Numero de téléphone :
            <input id="numtel" type="texte" required class="form-control" name="numtel" value='<?= $_SESSION['numtel'] ?>'>
                </li>
                <li> Adresse :
            <input id="adresse" type="texte" required class="form-control" name="adresse" value='<?= $_SESSION['adresse'] ?>'>
                </li>
                <li> Ville :
            <input id="ville" type="texte" required class="form-control" name="ville" value='<?= $_SESSION['ville'] ?>'>
                </li>
                <li> Code Postal :
            <input id="cp" type="texte" required class="form-control" name="cp" value='<?= $_SESSION['cp'] ?>'>
                </li>
                <li> Adresse mail :
            <input id="mail" type="email" required class="form-control" name="mail" value='<?= $_SESSION['mail'] ?>'>
                </li>
                <li> Mot de passe :
            <input id="mdp" type="password" required class="form-control" name="mdp" value='<?= $_SESSION['mdp'] ?>'>
                </li>
                <li> Praticien :
                <input id="idprat" type="hidden" required class="form-control" name="idprat" value='<?= $_SESSION['idprat'] ?>'>
                    <div>Dr. <?= $medecin->getNom().' '.$medecin->getPrenom() ?></div>
                    <div> Mail :  <?= $medecin->getMail() ?></div>
                </li>
            </ul>


            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Valider les modifications</button>
                </div>
            </div>
        </form>    
      
        
        <form action='/phpMed/connexion/patient/calendrier'>
            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Consulter les rendez-vous</button>
                </div>
            </div>
        </form>   
            
    
</div>


<?php
require_once 'inc/footer.php';
?>

