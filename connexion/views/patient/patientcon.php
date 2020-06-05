<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
$pdo = get_pdo();
$medecinDAO = new medecinDAO($pdo);
$listeMedecin = $medecinDAO->getList();
?>
   <div class="d-flex flex-row align-items-center justify-content-between mx-md-3">

        <?php $indicesServer = $_SERVER['REQUEST_URI'] ;
        $test = explode('/', $indicesServer);
        if(isset($test[4])):        
            if ( $test[4] == 'success'): ?>
                <div class="container">
                    <div class="alert alert-success">
                    Votre compte a bien été crée, vous pouvez maintenant vous connecter
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $test[4] == 'wrong'): ?>
                <div class="container">
                    <div class="alert alert-danger">
                        Mauvaise combinaison login/mdp
                    </div>
                </div>

            <?php endif; ?>
        <?php endif; ?>   
         

    </div>


<div class="row ">  
    <div class="col-md-3 offset-md-3">
        <form method="post" class="form" action="/phpMed/connexion/patient/profil/connec">
            
            <div class="col-md-12">
                <div class="form-group">
                    <h3 >Dejà patient ?</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mail">Identifiant : </label>
                    <input id="mail" type="text" required class="form-control" name="mail" placeholder="mail">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mdp">Mot de passe : </label>
                    <input id="password" type="password" required class="form-control" name="mdp" placeholder="mot de passe">
                </div>
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between mx-md-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Connexion</button>
                </div>
            </div>  
        </form>
    </div>

    <div class="col-md-3">
        <form method="post" class="form" action="/phpMed/connexion/patient/profil/newpat">
            <div class="col-md-12">
                <div class="form-group ml-md-4">
                    <h3>Nouveau Patient ?</h3>
                </div>
            </div>
            <div class="form-group">
                <ul style="list-style:none">
                    <li> <p>Nom :
                <input id="nom" type="texte" required class="form-control" name="nom" placeholder="Dupont">
                    </li>
                    <li> <p>Prenom :
                <input id="prenom" type="texte" required class="form-control" name="prenom" placeholder="Paul">
                    </li>
                    <li> <p>Numero de téléphone :
                <input id="numtel" type="texte" required class="form-control" name="numtel" placeholder="01.23.45.67.89">
                    </li>
                    <li> <p>Adresse :
                <input id="adresse" type="texte" required class="form-control" name="adresse" placeholder="22 chemin des prés fleuris">
                    </li>
                    <li> <p>Ville :
                <input id="ville" type="texte" required class="form-control" name="ville" placeholder="St Jean sur Loire">
                    </li>
                    <li> <p>Code Postal :
                <input id="cp" type="texte" required class="form-control" name="cp" placeholder="44360">
                    </li>
                    <li> <p>Adresse mail :
                <input id="mail" type="email" required class="form-control" name="mail" placeholder="DupontPaul@phpmed.com">
                    </li>
                    <li> <p>Nom du praticien :
                <select id="idprat" required class="form-control" name="idprat">
                    <?php foreach($listeMedecin as $medecin):?>
                        <option value= <?= $medecin->getId() ?>>Dr. <?= $medecin->getPrenom().' '.$medecin->getNom() ?></option>
                    <?php endforeach;?>
                </select> 
                    </li>
                    <li> <p>Mot de passe :
                <input id="mdp" type="password" required class="form-control" name="mdp" placeholder="**********" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Dois contenir au minimum un nombre, une majuscule et une minuscule, et dois faire 8 caractères ou plus" >
                    </li>
                        <div id="verif">
                            <h5>Votre mot de passe contient :</h5>
                            <p id="letter" class="invalid">Une <b>minuscule</b> </p>
                            <p id="capital" class="invalid">Une <b>Majuscule</b> </p>
                            <p id="number" class="invalid">Un <b>nombre</b></p>
                            <p id="length" class="invalid">Minimum <b>8 caractères</b></p>
                        </div>
                </ul>
            </div>
            <div class="d-flex flex-row justify-content-between form-group col-md-12 ml-md-4">
                <button class="btn btn-primary col-md-12" >Valider</button>
            </div>     
        </form>
    </div>
</div>


<?php
require_once 'inc/footer.php';
?>

