<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
$pdo = get_pdo();
$medecinDAO = new medecinDAO($pdo);
$listeMedecin = $medecinDAO->getList();
?>

    

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">


    

       
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
    <div class="col-sm-6">
        <form method="post" class="form" action="/phpMed/connexion/patient/profil/connec">
            
            <div class="col-sm-12">
                    <div class="form-group">
                        <h2 >Dejà patient ?</h2>
                        
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="mail">Identifiant : </label>
                        <input id="mail" type="text" required class="form-control" name="mail" placeholder="mail">
                    </div>
                </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="mdp">Mot de passe : </label>
                    <input id="password" type="password" required class="form-control" name="mdp" placeholder="mot de passe">
                </div>
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Connexion</button>
                </div>
            </div>  
        </form>
    </div>

    <div class="col-sm-6">
        <form method="post" class="form" action="/phpMed/connexion/patient/profil/newpat">
            
                <div class="col-sm-12">
                    <div class="form-group">
                        <h2>Nouveau Patient ?</h2>
                    </div>
                </div>
            
                <div class="form-group">
                    <ul>
                        <li> Nom :
                    <input id="nom" type="texte" required class="form-control" name="nom" placeholder="bonno">
                        </li>
                        <li> Prenom :
                    <input id="prenom" type="texte" required class="form-control" name="prenom" placeholder="jean">
                        </li>
                        <li> Numero de téléphone :
                    <input id="numtel" type="texte" required class="form-control" name="numtel" placeholder="00.00.00.00.00">
                        </li>
                        <li> Adresse :
                    <input id="adresse" type="texte" required class="form-control" name="adresse" placeholder="22 chemin des prés fleuris">
                        </li>
                        <li> Ville :
                    <input id="ville" type="texte" required class="form-control" name="ville" placeholder="St Jean sur Loire">
                        </li>
                        <li> Code Postal :
                    <input id="cp" type="texte" required class="form-control" name="cp" placeholder="44360">
                        </li>
                        <li> Adresse mail :
                    <input id="mail" type="email" required class="form-control" name="mail" placeholder="jeanbonno@truc.com">
                        </li>
                        <li> Mot de passe :
                    <input id="mdp" type="password" required class="form-control" name="mdp" placeholder="**********">
                        </li>
                        <li> Nom du praticien :
                    <select id="idprat" required class="form-control" name="idprat">
                        <?php foreach($listeMedecin as $medecin):?>
                            <option value= <?= $medecin->getId() ?>>Dr. <?= $medecin->getPrenom().' '.$medecin->getNom() ?></option>
                        <?php endforeach;?>
                    </select> 
                        </li>
                    </ul>
                    
                </div>
            
            <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
                <div class="form-group">
                    <button class="btn btn-primary" >Valider</button>
                </div>
            </div>
              
        </form>
    </div>
</div>


<?php
require_once 'inc/footer.php';
?>

