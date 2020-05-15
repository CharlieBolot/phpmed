<?php
require_once 'connexion/inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/patient.php';
require_once 'connexion/src/patientDAO.php';
//require 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'connexion.php';
$patientDAO = new patientDAO($pdo);
$listePatient = $patientDAO->getlist();
?>

    <nav class="navbar navbar-dark bg-primary mb-3">
    <h1 class="navbar-brand"> Profil </h1> 
    </nav>


   
<div class="row ">  
    

    <div class="col-sm-6">
        
          <div class="col-sm-12">
                <div class="form-group">
                        <h2>Bienvenu docteur <?= $_SESSION['prenom'].' '.$_SESSION['nom'] ?></h2>
                        <h3> Que voulez-vous faire ?<h3>
                            <div class='btn-group-vertical btn-group-sm mb-3 ' role="group" aria-label="optionprat">                                    
                                <button type="button" class="btn btn-primary text-left" >Consulter vos rendez-vous</button>                                
                                <button type="button" class="btn btn-primary text-left" >Consulter la liste des patients</button>
                                <button type="button" class="btn btn-primary text-left" >Consulter vos emails</button>   
                            </div>
                </div>

            </div>

            <div class="col-sm-12">
                <h4>Liste des patients</h4>
                <form action='/phpMed/connexion/praticien/recherchepatient' label='recherchepatient'>
                    <input id="recherche" type="text" required class="form-control" name="nom prenom" placeholder="nom ou prénom">
                </form>
                <ul>
                    <?php foreach($listePatient as $patient):?>
                        <li> <a href=""><?= $patient->getNom().' '.$patient->getPrenom() ?></a></li>
                    <?php endforeach;?>
                </ul>


            </div>



</div>
            
                


<?php
require_once 'connexion/inc/footer.php';
?>

