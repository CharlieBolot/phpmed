<?php
require_once 'connexion/inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
$medecinDAO = new medecinDAO($pdo);
$listeMedecin = $medecinDAO->getList();
?>
    <nav class="navbar navbar-dark bg-primary mb-3">
    <p class="navbar-brand">Connexion</p>
    </nav>

    <?php $indicesServer = $_SERVER['REQUEST_URI'] ;
        $test = explode('/', $indicesServer);
        if(isset($test[4])):        
            if ( $test[4] == 'wrong'): ?>
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
        <form method="post" class="form" action="/phpMed/connexion/praticien/connec">
            
            <div class="col-sm-12">
                    <div class="form-group">
                        <h2 >Vos identifiants</h2>
                        
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


<?php
require_once 'connexion/inc/footer.php';
?>

