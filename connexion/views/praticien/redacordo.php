<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medicament.php';
require_once 'connexion/src/medicamentDAO.php';
require_once 'connexion/function/function.php';
$pdo= get_pdo();
$medicamentDAO = new medicamentDAO($pdo);
$listemedoc = $medicamentDAO->getList()
?>

<div class='row col-md-12'>
    

    <div class='offset-sm-2 col-md-4'>
        <form name="ajoutmedoc" action="/phpmed/connexion/praticien/profil/newordo" method="POST" >
            <div class="col-md-8">
                <h4>Ajouter un médicament :</h4>
                <select id="nommedoc" class="form-control" name="idmedoc">
                    <?php foreach($listemedoc as $medoc):?>
                        <?php var_dump($medoc->getNom()); ?>
                        <option value= <?= ($medoc->getId_Medicament())?>> <?php echo($medoc->getNom())?></option>
                    <?php endforeach;?>
                </select>
            </div> 
            <div class="col-md-8">
                <h4><br>Posologie :</h4>
                <input id="poso" type="texte" class="form-control" name="poso" placeholder="" size="100" maxlength="100"><br>
            </div>
         
            <div class="form-group col-md-8">
                
                    <button class="btn btn-primary col-md-12" >Valider</button>
                
            </div>
            
        </form>
        <form name="retourpatient" action="/phpMed/navigation/retourpatient.php" >
            <div class="form-group col-md-8">
                <button class="btn btn-primary col-md-12" >Sauvegarder et quitter</button>
            </div>
        </form>
    </div>

    <div clas='col-md-4'>
        <iframe src="/phpMed/connexion/praticien/profil/redacordo" 
            width="700" 
            height="550" 
            style="border:2px solid">
        </iframe>
    </div>



</div>