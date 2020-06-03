<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
require_once 'connexion/src/ordo.php';
require_once 'connexion/src/ordoDAO.php';
require_once 'connexion/src/ligne_ordo.php';
require_once 'connexion/src/ligne_ordoDAO.php';
require_once 'connexion/src/medicament.php';
require_once 'connexion/src/medicamentDAO.php';
require_once 'connexion/function/function.php';
//require 'connexion'.DIRECTORY_SEPARATOR.'function'.DIRECTORY_SEPARATOR.'connexion.php';
$pdo= get_pdo();
$medecinDAO = new medecinDAO($pdo);
$ordoDAO = new OrdoDAO($pdo);
$ligneordoDAO = new Ligne_ordoDAO($pdo);
$medicamentDAO = new medicamentDAO($pdo);
$liste_ordo = $ordoDAO->getList();
$i = $_GET["id"];

?>


<div class="row ">  

    <!--</?php var_dump($_SESSION['fiche'][0][1]) ?>--->

    

    <div class="col-sm-6"> 
        <div class="col-sm-12">
            <div class="form-group">
                    <h2><?= $_SESSION['fiche'][$i][1].' '.$_SESSION['fiche'][$i][2] ?></h2>
                </div>
            </div>



    
        <form method="post" class="form-group" action="/phpMed/connexion/patient/profil/modif/">
            <ul>
                <li> Nom :
            <input id="nom" type="texte" required class="form-control" name="nom" value='<?= $_SESSION['fiche'][$i][1] ?>'>
                </li>
                <li> Prenom :
            <input id="prenom" type="texte" required class="form-control" name="prenom" value='<?= $_SESSION['fiche'][$i][2] ?>'>
                </li>
                <li> Numero de téléphone :
            <input id="numtel" type="texte" required class="form-control" name="numtel" value='<?= $_SESSION['fiche'][$i][3] ?>'>
                </li>
                <li> Adresse :
            <input id="adresse" type="texte" required class="form-control" name="adresse" value='<?= $_SESSION['fiche'][$i][4] ?>'>
                </li>
                <li> Ville :
            <input id="ville" type="texte" required class="form-control" name="ville" value='<?= $_SESSION['fiche'][$i][5] ?>'>
                </li>
                <li> Code Postal :
            <input id="cp" type="texte" required class="form-control" name="cp" value='<?= $_SESSION['fiche'][$i][6] ?>'>
                </li>
                <li> Adresse mail :
            <input id="mail" type="email" required class="form-control" name="mail" value='<?= $_SESSION['fiche'][$i][0] ?>'>
                </li>
                
            </ul>
        </form>    
      
        
        <form action='/phpMed/connexion/patient/calendrier'> <!-- TODO modiifier pour aficher la liste des rdv du patient ? -->
            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Consulter les rendez-vous</button>
                </div>
            </div>
        </form> 
        
        <form action='/phpMed/connexion/praticien/profil/ordo'> 
            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Ajouter une ordonnance</button>
                </div>
            </div>
        </form> 
            
    
</div>

<div class="col-sm-6"> 

    

     <!-- </?php var_dump($liste_ordo)?>  -->
     <h2>Liste d'ordonnance : </h2>
     
         
     <?php 
        $h=1;
        foreach($liste_ordo as $ordos):?>
        
        <?php $ligneordos = $ordos->getDate();?> 
        <button class="btn btn-secondary" onclick="visibilite('ordo<?=$h?>')">Ordonnance du : <?php  print_r($ligneordos); ?></button><br>
        <div id="ordo<?=$h?>" style='display:none' >
            <b>Prescription : </b><br>
            <?php $ligneordo = $ligneordoDAO->getListOrdo($ordos->getId());?>
            <?php foreach($ligneordo as $ligne):?>
                <?php  $nomedoc = $medicamentDAO->getMedoc($ligne->getId_medicament()); ?>

                <?php print_r($nomedoc[0]['nom']); ?> :
                <?php print_r($ligne->getPosologie()); ?><br>
            <?php endforeach;?> 
            <br>
        </div>

        
     <?php 
        $h++;
    endforeach;?> 
            
        

</div>


<?php
require_once 'inc/footer.php';
?>

