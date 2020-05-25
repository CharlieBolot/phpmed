<?php
require_once 'connexion/bdd/bdd.php';


$pdo= get_pdo();
$events = new Calendar\Events($pdo);
if( !isset($_SESSION['id'])){
    header('location: connexion\views\404.php');
}

try {
    $event = $events->find($_SESSION['id']);
} catch (\Exception $e) {
    e404();
}




render('inc/header.php',['title'=> $event->getName()]);
?>

<h1><?= h($event->getName()); ?></h1>

<ul>
    <li>Date : <?= $event->getStart()->format('d/m/Y'); ?></li>
    <li>Heure de démarrage : <?= $event->getStart()->format('H:i'); ?></li>
    <li>Heure de fin : <?= $event->getEnd()->format('H:i'); ?></li>
    <li>Description :<br>
     <?= h($event->getDescription()); ?>
    </li>




    
</ul>

<?php require 'inc/footer.php';?>
