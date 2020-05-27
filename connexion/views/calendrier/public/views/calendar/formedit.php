<?php 
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
require_once 'connexion/src/patient.php';
require_once 'connexion/src/patientDAO.php';
$pdo= get_pdo();
$medecinDAO = new medecinDAO($pdo);
$patientDAO = new patientDAO($pdo);
?>

<div class="row">
<div class="col-sm-6">
        <div class="form-group">
            <label for="idpat">Nom du patient</label>
            <input id="idpat" type="hidden" required class="form-control" name="idpat" value="<?= isset($data['idpat']) ? h($data['idpat']) : ''; ?>">
            <input type="text" class="form-control" name="" disabled value="<?= $patientDAO->getpatient($_SESSION['idpat'])->getNom()?> <?= $patientDAO->getpatient($_SESSION['idpat'])->getPrenom()?>">
        
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="date">Date</label>
            <input id="date" type="date" required class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : ''; ?>">
            <?php if(isset($errors['date'])): ?>
                <p class="help-block"><?= $errors['date']; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="start">Heure démarrage</label>
            <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MMM" value="<?= isset($data['start']) ? h($data['start']) : ''; ?>">
            <?php if(isset($errors['start'])): ?>
                <small class="form-text text-muted"><?= $errors['start']; ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="idprat">Medecin</label>
            <input id="idprat" type="hidden" required class="form-control" name="idprat" value="<?= isset($data['idprat']) ? h($data['idprat']) : ''; ?>">
            <input type="text" class="form-control" name="" disabled value="Dr.<?= $medecinDAO->getmedecin($_SESSION['idprat'])->getNom()?>">
        </div>
</div>


           
            
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" readonly="readonly" class="form-control"><?= isset($data['description']) ? h($data['description']) : ''; ?></textarea>
            </div>