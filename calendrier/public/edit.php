<?php
require_once '../src/bootstrap.php';
$pdo= get_pdo();
$events = new Calendar\Events($pdo);
$errors = [];


try {
    $event = $events->find($_GET['id'] ?? null);
} catch (\Exception $e) {
    e404();
}catch (\Error $e) {
    e404();
}

$data = [
    'name' => $event->getName(),
    'date' => $event->getStart()->format('Y-m-d'),
    'start' => $event->getStart()->format('H:i'),
    'end' => $event->getEnd()->format('H:i'),
    'description' => $event->getDescription()
];




if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    $validator = new Calendar\EventValidator();
    $errors = $validator->validates($data);
    if(empty($errors)){
        $events->hydrate($event, $data);
        $events->update($event);
        header('Location: index?success=1');
        exit ();
    }


}


render('header.php',['title'=> $event->getName()]);
?>

<div class="container">
    <h1>Changer mon rendez-vous <small><?= h($event->getName()); ?> </small></h1>

    <form action="" method="post" class="form">
        <?php render('calendar/formedit.php',['data' => $data, 'errors' => $errors]); ?>
             <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    
                 <div class="form-group">
                    <button class="btn btn-primary" >Modifier l'évènement</button>
                    
                </div>
                
            </div>  
        </div>
    </form>

    <form action="delete.php?id=<?= $event->getId();?>" method="post" class="form">
        <?php render('calendar/formedit.php',['data' => $data, 'errors' => $errors]); ?>
             
    
                 <div class="form-group">
                    <button class="btn btn-primary">Supprimer l'évènement</button>
                    
                
                
            </div>  
        </div>
    </form>

</div>

<?php render('footer.php');?>
