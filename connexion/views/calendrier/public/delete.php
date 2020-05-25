<?php
require_once 'connexion/bdd/bdd.php';
$pdo= get_pdo();
$events = new Calendar\Events($pdo);
$errors = [];


try {
    $event = $events->find($_SESSION['id'] ?? null);
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


// TODO : changer le lien dans le header - success

    $validator = new Calendar\EventValidator();
   
    if(empty($errors)){
        $events->hydrate($event, $data);
        $events->delete($event);
        header('Location: connexion\views\calendrier\public\Calend.php?success=1');
        
        exit ();
    }

//print_r($errors);


