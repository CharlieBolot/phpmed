<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/patient.php';
require_once 'connexion/src/patientDAO.php';
require_once 'connexion/function/nextrdv.php';
require_once 'connexion/function/function.php';
$pdo= get_pdo();
$patientDAO = new patientDAO($pdo);
$listePatient = $patientDAO->getlist();


?> 

 <h2 class="text-center">Bienvenu Dr. <?= $_SESSION['prenom'].' '.$_SESSION['nom'] ?></h2>
<div class="row d-flex flex-row justify-content-center">  
    

    <div class="col-xl-3 col-lg-5 mr-4">
            <div class="form-group">
                        <h2>&nbsp</h2>
            </div>
            <div id="patient" class="col-sm-12" >
                <h4>Liste des patients</h4>
                <form action='/phpMed/connexion/praticien/recherchepatient/rch' label='recherchepatient' method='post'>
                    <input id="recherche" type="text" required class="form-control" name="nom" placeholder="nom ou prénom">
                </form>

                <?php if(!empty($_SESSION['message'])):?>
                        <?php $taille = count($_SESSION['message']); 
                        for($i=0;$i<$taille;$i++):?>
                            <div class="container">
                                <?php echo'<pre>';
                                print_r($_SESSION['message'][$i]);
                                echo'</pre>' ?>
                            </div>
                        <?php endfor;?>
                    
                <?php endif; ?>
                <br>
                <ul>
                    <?php foreach($listePatient as $patient):?>
                        <form action='/phpMed/connexion/praticien/recherchepatient/rchspc' method='POST'>
                            <input type="text" readonly hidden name="nom" value='<?= $patient->getNom().' '.$patient->getPrenom() ?>'><?= $patient->getNom().' '.$patient->getPrenom() ?></input>
                            <button type="submit button" class="btn btn-outline-dark btn-sm" value="info">info</button>
                        </form><br>
                    <?php endforeach;?>
                </ul>


            </div>
    </div>
    <div class="col-xl-5 col-lg-7 ml-4">
            <div class="form-group">
                        <h2>&nbsp</h2>
            </div>
        <div class="col-sm-12" >
                <h4>Vos Mails :</h4>
                <div class="container form-control">
                                <?php echo('pas de mails pour l\'instant');?>
                </div>

        </div>
        <br>
        <div class="col-sm-12" >
            <fieldset>
                <legend>Votre prochain rendez-vous :</legend>
                <?php if(!empty($nextrdv)):?>
                <div>                    
                    <div class="form-group pr-5 text-justify" style="padding-left:100px;">
                        
                            <p id="nom" style="text-indent:-100px;"> <b>Patient :</b> <?= $nextpat[0]['nom'] ?>  <?= $nextpat[0]['prenom'] ?></p>
                             
                            <p id="numtel" style="text-indent:-100px;"> <b>Numero de téléphone : </b><?= $nextpat[0]['numtel'] ?></p>
                          
                            <p id="adresse" style="text-indent:-100px;"> <b>Adresse : </b><?= $nextpat[0]['adresse'] ?> à <?= $nextpat[0]['ville'] ?> </p>
                                
                            <p id="adresse" style="text-indent:-100px;"><b>Motif du R.D.V :</b> <?= $nextrdv['description'] ?> </p>
                                
                            <p id="adresse" style="text-indent:-100px;"><b>Heure de début : </b><?= $nexttime ?> </p>
                            

                        
            
                     </div>

                </div>
                <?php else :?>
                    <div>                  
                            <h5> Aucun rendez-vous restant aujourd'hui !</h5>       
                     </div>
                <?php endif; ?>
                <form action ='/phpMed/connexion/praticien/calendrier'> <button type="submit" class="btn btn-primary text-left" >Consulter vos rendez-vous</button> 

            </fieldset>

        </div>
    </div>



</div>




            
                


<?php
require_once 'inc/footer.php';
?>

