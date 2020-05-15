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




    $validator = new Calendar\EventValidator();
   
    if(empty($errors)){
        $events->hydrate($event, $data);
        $events->delete($event);
        header('Location: index?success=1');
        exit ();
    }

print_r($errors);


