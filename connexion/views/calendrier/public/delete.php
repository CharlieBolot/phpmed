<?php
require_once 'connexion/bdd/bdd.php';
require_once 'connexion\src\Calendar\Event.php';
require_once 'connexion\src\Calendar\Events.php';
require_once 'connexion\src\Calendar\EventValidator.php';
$pdo= get_pdo();
$events = new Calendar\Events($pdo);
$errors = [];
$type = $_SESSION['type'];
$idpat = $_SESSION['idpat'];
$idprat = $_SESSION['idprat'];

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




    $validator = new Calendar\EventValidator();
   
    if(empty($errors)){
        $events->hydrate($event, $data);
        $events->delete($event);
        header('Location: /phpmed/connexion/'.$type.'/calendrier/success');
        
        exit ();
    }

//print_r($errors);


