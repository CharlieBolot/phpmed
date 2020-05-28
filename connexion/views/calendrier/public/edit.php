<?php
require_once 'connexion/bdd/bdd.php';
require_once 'connexion\src\Calendar\Events.php';
require_once 'connexion\src\Calendar\EventValidator.php';
$pdo= get_pdo();
$events = new Calendar\Events($pdo);
$errors = [];
$type = $_SESSION['type'];
if(isset($_SESSION['idpat'])){
    $idpat = $_SESSION['idpat'];
}else{
    $idpat = '';
};
$idprat = $_SESSION['idprat'];


if($type != 'praticien'){

    try {
        $event = $events->find($_GET['id'] ?? null);
    } catch (\Exception $e) {
        e404();
    }catch (\Error $e) {
        e404();
    }

    $data = [
        
        'date' => $event->getStart()->format('Y-m-d'),
        'start' => $event->getStart()->format('H:i'),
        'end' => $event->getEnd()->format('H:i'),
        'description' => $event->getDescription(),
        'idpat' => $idpat,
        'idprat' => $idprat

    ];




    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = $_POST;
        $validator = new Calendar\EventValidator();
        $errors = $validator->validates($data);
        if(empty($errors)){
            $events->hydrate($event, $data);
            $events->update($event);
            
            header('Location: /phpmed/connexion/'.$type.'/calendrier/success');
            exit ();
        }


    }


    //render('inc/header.php',['title'=> $event->getName()]);
    ?>

    <div class="container">
        <h1>Changer mon rendez-vous </h1>

        <form action="" method="post" class="form">
            <?php render('connexion\views\calendrier\public\views\calendar\formedit.php',['data' => $data, 'errors' => $errors]); ?>
                <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        
                    <div class="form-group">
                        <button class="btn btn-primary" >Modifier le rendez-vous</button>
                        
                    </div>
                    
                </div>  
            </div>
        </form>

        <form action="\phpmed\connexion\patient\calendrier\delete?id=<?= $event->getId();?>" method="post" class="form">
            <?php render('connexion\views\calendrier\public\views\calendar\formedit.php',['data' => $data, 'errors' => $errors]); ?>
                
        
                    <div class="form-group">
                        <button class="btn btn-primary">Annuler le rendez-vous</button>
                        
                    
                    
                </div>  
            </div>
        </form>

    </div>

    <?php render('inc/footer.php');
}else{
    try {
        $event = $events->find($_GET['id'] ?? null);
    } catch (\Exception $e) {
        e404();
    }catch (\Error $e) {
        e404();
    }

    $data = [
        
        'date' => $event->getStart()->format('Y-m-d'),
        'start' => $event->getStart()->format('H:i'),
        'end' => $event->getEnd()->format('H:i'),
        'description' => $event->getDescription(),
        'idpat' => $idpat,
        'idprat' => $idprat

    ];




    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = $_POST;
        $validator = new Calendar\EventValidator();
        $errors = $validator->validates($data);
        if(empty($errors)){
            $events->hydrate($event, $data);
            $events->update($event);
            
            header('Location: /phpmed/connexion/'.$type.'/calendrier/success');
            exit ();
        }
    }?>

    <div class="container">
        <h1>Changer un rendez-vous </h1>

        <form action="" method="post" class="form">
            <?php render('connexion\views\calendrier\public\views\calendar\formprat.php',['data' => $data, 'errors' => $errors]); ?>
            
                <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        
                    <div class="form-group">
                        <button class="btn btn-primary" >Modifier le rendez-vous</button>
                        
                    </div>
                    
                </div>  
            </div>
        </form>

        <form action="\phpmed\connexion\patient\calendrier\delete?id=<?= $event->getId();?>" method="post" class="form">
            <?php render('connexion\views\calendrier\public\views\calendar\formprat.php',['data' => $data, 'errors' => $errors]); ?>
                
        
                    <div class="form-group">
                        <button class="btn btn-primary">Annuler le rendez-vous</button>
                        
                    
                    
                </div>  
            </div>
        </form>

    </div>

    <?php render('inc/footer.php');

}?>