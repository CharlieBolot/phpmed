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

<div class=row>
    <div clas='col-md-6'>
        <iframe src="/phpMed/connexion/praticien/profil/redacordo" 
            width="700" 
            height="550" 
            style="border:2px solid">
        </iframe>
    </div>

    <div clas='col-md-6'>
        <form name="ajoutmedoc" action="/phpmed/connexion/praticien/profil/newordo" method="POST" >
            <div class="col-6">
                <h4>Ajouter un médicament :</h4>
                <select id="nommedoc" class="form-control" name="idmedoc">
                    <?php foreach($listemedoc as $medoc):?>
                        <?php var_dump($medoc->getNom()); ?>
                        <option value= <?= ($medoc->getId_Medicament())?>> <?php echo($medoc->getNom())?></option>
                    <?php endforeach;?>
                </select>
            </div> 
            <div class="col-6">
                <h4>Posologie :</h4>
                <input id="poso" type="texte" class="form-control" name="poso" placeholder="" size="100" maxlength="100">
            </div> 
            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Valider</button>
                </div>
            </div>
            
        </form>
        <form name="retourpatient" action="/phpMed/navigation/retourpatient.php" >
        <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Sauvegarder et quitter</button>
                </div>
            </div>
            
        </form>
    </div>



</div>