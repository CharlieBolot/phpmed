<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medicament.php';
require_once 'connexion/src/medicamentDAO.php';
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

        <div class="col-6">
            <h4>Ajouter un médicament :</h4>
            <select id="idmedoc" class="form-control" name="idmedoc">
                <?php foreach($listemedoc as $medoc):?>
                    <?php var_dump($medoc->getNom()); ?>
                    <option value= <?= ($medoc->getNom())?>> <?php echo($medoc->getNom())?></option>
                <?php endforeach;?>
            </select>
        </div> 
        <div class="col-6">
            <h4>Posologie :</h4>
            <input id="poso" type="texte" class="form-control" name="poso" placeholder="" size="100" maxlength="100">
        </div> 
    </div>

</div>