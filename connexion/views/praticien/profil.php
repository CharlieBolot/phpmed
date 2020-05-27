<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/patient.php';
require_once 'connexion/src/patientDAO.php';
require_once 'connexion/function/nextrdv.php';
$pdo= get_pdo();
$patientDAO = new patientDAO($pdo);
$listePatient = $patientDAO->getlist();

?>  
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

            <div class="col-sm-12" >
                <h4>Liste des patients</h4>
                <form action='/phpMed/connexion/praticien/recherchepatient/rch' label='recherchepatient' method='post'>
                    <input id="recherche" type="text" required class="form-control" name="nom" placeholder="nom ou prénom">
                </form>

                <?php if(!empty($_SESSION['message'])):?>
                        <?php $taille = count($_SESSION['message']); 
                        for($i=0;$i<$taille;$i++):?>
                            <div class="container form-control">
                                <?php print_r($_SESSION['message'][$i]);?>
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
    <div class="col-sm-6">
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
                <h4>Votre prochain rendez-vous :</h4>
                <?php if(!empty($nextrdv)):?>
                <div>                    
                    <div class="form-group">
                        <ul>
                            <li> Patient :
                        <div id="nom" type="texte" required class="form-control" name="nom" ><?= $nextpat[0]['nom'] ?> <?= $nextpat[0]['prenom'] ?></div>
                            </li>
                            <li> Numero de téléphone :
                        <div id="numtel" type="texte" required class="form-control" name="numtel" ><?= $nextpat[0]['numtel'] ?></div>
                            </li>
                            <li> Adresse :
                        <div id="adresse" type="texte" required class="form-control" name="adresse" ><?= $nextpat[0]['adresse'] ?> à <?= $nextpat[0]['ville'] ?> </div>
                            </li>
                            <li> Motif du R.D.V :
                        <div id="adresse" type="texte" required class="form-control" name="adresse" ><?= $nextrdv['description'] ?> </div>
                            </li>
                            <li> Heure de début :
                        <div id="adresse" type="texte" required class="form-control" name="adresse" ><?= $nexttime ?> </div>
                            </li>

                        </ul>
            
                     </div>

                </div>
                <?php else :?>
                    <div>
                        <ul>                    
                            <li><h5> Aucun rendez-vous restant aujourd'hui </h5></li>
                        </ul>
                     </div>
                <?php endif; ?>

        </div>
    </div>



</div>
            
                


<?php
require_once 'inc/footer.php';
?>

