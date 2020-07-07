<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/patient.php';
require_once 'connexion/src/patientDAO.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
require_once 'connexion/function/function.php';
$pdo= get_pdo();
$patientDAO = new patientDAO($pdo);
$medecinDAO = new medecinDAO($pdo);
$listePatient = $patientDAO->getlist();
$listeMed = $medecinDAO->getlist();


?> 

 <h2 class="text-center">Bienvenu Administrateur </h2>
<div class="row d-flex flex-row justify-content-center">  
    

    <div class="col-lg-12 row">
           
            <div id="patient" class="col-lg-6" >
                <h4>Liste des patients</h4>
                <form action='/phpMed/connexion/admin/recherchepatient/rch' label='recherchepatient' method='post'>
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
                        <form action='/phpMed/connexion/admin/recherchepatient/rchspc' method='POST'>
                            <input type="text" readonly hidden name="nom" value='<?= $patient->getNom().' '.$patient->getPrenom() ?>'><?= $patient->getNom().' '.$patient->getPrenom() ?></input>
                            <button type="submit button" class="btn btn-outline-dark btn-sm" value="info">info</button>
                        </form>
                        <form action='/phpMed/connexion/admin/recherchepatient/del' method='POST'>
                            <input type="text" hidden name="id" value='<?= $patient->getId()?>'></input>
                            <button type="submit button" class="btn btn-outline-dark btn-sm" value="supprimer">supprimer</button>
                        </form><br>
                    <?php endforeach;?>
                </ul>


            </div>
            <div id="praticien" class="col-lg-6" >
                <h4>Liste des praticiens</h4>
                <form action='/phpMed/connexion/admin/rechercheprat/rch' label='rechercheprat' method='post'>
                    <input id="recherche" type="text" required class="form-control" name="nom" placeholder="nom ou prénom">
                </form>

                <?php if(!empty($_SESSION['messageprat'])):?>
                        <?php $taille = count($_SESSION['messageprat']); 
                        for($i=0;$i<$taille;$i++):?>
                            <div class="container">
                                <?php echo'<pre>';
                                print_r($_SESSION['messageprat'][$i]);
                                echo'</pre>' ?>
                            </div>
                        <?php endfor;?>
                    
                <?php endif; ?>
                <br>
                
                    <?php foreach($listeMed as $med):?>
                        <form action='/phpMed/connexion/admin/rechercheprat/rchspc' method='POST'>
                            <input type="text" readonly hidden name="nom" value='<?= $med->getNom().' '.$med->getPrenom() ?>'><?= $med->getNom().' '.$med->getPrenom() ?></input>
                            <button type="submit button" class="btn btn-outline-dark btn-sm" value="info">info</button>
                        </form>
                        <form action='/phpMed/connexion/admin/rechercheprat/del' method='POST'>
                            <input type="text" hidden name="id" value='<?= $med->getId()?>'></input>
                            <button type="submit button" class="btn btn-outline-dark btn-sm" value="supprimer">supprimer</button>
                        </form>
                        <br>
                    <?php endforeach;?>

                <div id="addpraticien" class="col-sm-12" >
                    <h4>Ajouter un praticien</h4>
                        
                    <form action='/phpMed/connexion/admin/addprat' method='POST'>
                        Nom :  <input type="text" name="nom" placeholder="nom"><br>
                        Prenom : <input type="text" name="prenom" placeholder="prenom"><br>
                        Adresse Mail :  <input type="text" name="mail" placeholder="adresse mail"><br>
                        Mot de passe : <input type="text" name="mdp" placeholder="mot de passe"><br>
                        <button type="submit button" class="btn btn-outline-dark btn-sm " value="valider">Valider</button>
                    </form>
                </div>
            </div>
            
    </div>
</div>


        
                


<?php
require_once 'inc/footer.php';
?>

