<?php
require_once 'inc/header.php';
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/admin.php';
require_once 'connexion/src/adminDAO.php';
$pdo= get_pdo();

?>
    

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

  

<div class="row justify-content-center">  
    <div class="col-xl-4 col-lg-4 ">
        <form method="post" class="form" action="/phpMed/connexion/admin/connec">
            
            <div class="col-sm-12 ">
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
require_once 'inc/footer.php';
?>

