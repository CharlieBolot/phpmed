<?php
require_once 'connexion/bdd/bdd.php';
require_once 'connexion/src/medecin.php';
require_once 'connexion/src/medecinDAO.php';
require_once 'connexion/src/Calendar/Week.php';

$pdo = get_pdo();
$medecinDAO = new medecinDAO($pdo);
if(isset($_GET['week'])){
    $sem = $_GET['week'];
    $yea = $_GET['year'];
   
}
if(isset($_GET['id'])){
    $id = $_GET['id'] ;
    $prat = $_GET['idprat'];
}

require_once 'connexion\src\Calendar\Events.php';
$events = new Calendar\Events($pdo); 

$week = new Calendar\Week($sem ?? null, $yea ?? null);   

// Debut de semaine en cours
$start= $week->premierdelasemaine();

// Fin de semaine en cours
$end=(clone $start)->modify("+6 days");
  
    $events = $events->getEventsBetweenByDay($start,$end);

?>

    
<div class="calendar">

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?= $week->toString($start->format('m')); ?></h1>

        <?php if ( isset($_GET['success'])): ?>
            <div class="container col-3">
                <div class="alert alert-success w-100">
                    L'action a bien été enregistrée
                </div>
            </div>
            <?php endif; ?>


            <?php $indicesServer = $_SERVER['REQUEST_URI'] ;
        $test = explode('/', $indicesServer);
        if(isset($test[5])):        
            if ( $test[5] == 'success'): ?>
                <div class="container col-3">
                    <div class="alert alert-success w-100">
                    L'action a bien été enregistrée
                    </div>
                </div>

           

        <?php endif; ?>   
         

    

        <?php endif; ?>
        
        



         <div class="d-flex flex-row justify-content-between align-items-center col-3">
             
            <a href="/phpMed/connexion/<?=$_SESSION['type']?>/calendrier?week=<?= $week->previousMonth()->week ?>&year=<?= $week->previousMonth()->year; ?>" class="mx-1 btn btn-primary"> Mois -1</a>
            <a href="/phpMed/connexion/<?=$_SESSION['type']?>/calendrier?week=<?= $week->nextMonth()->week;?>&year=<?= $week->nextMonth()->year; ?>" class="mx-1 btn btn-primary">Mois +1</a>



            <a href="/phpMed/connexion/<?=$_SESSION['type']?>/calendrier?year=<?= $week->previousWeek()->year; ?>&week=<?= $week->previousWeek()->week; ?>" class="mx-1 btn btn-primary"> semaine -1</a>
            <a href="/phpMed/connexion/<?=$_SESSION['type']?>/calendrier?year=<?= $week->nextWeek()->year; ?>&week=<?= $week->nextWeek()->week; ?>" class="mx-1 btn btn-primary">semaine +1</a>
        </div>

    </div>


    <table class="calendar__table "> <!--calendar__table--\<\?= $weeks; ?>weeks"-->

    

    
    <tr>
       
        <?php 
            foreach($week->days as $k => $day): 
           $date =  (clone $start)->modify("+" . $k."days");
           $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
           $isToday = date('Y-m-d') === $date->format('Y-m-d');
            ?>
        <td class="<?= $isToday ? 'is-today' : ''; ?> ">
            
            <div class="calendar__weekday"><?= $day; ?></div>
            
            <a class="calendar__day" href="\phpmed\connexion\patient\calendrier\add?date=<?= $date->format('Y-m-d'); ?>"><?= $date->format('d'); ?></a>
            <?php foreach ($eventsForDay as $event): ?>
                <div class="calendar__event">
                   <?= (new DateTime($event['start']))->format('H:i') ?> -  <a href="\phpmed\connexion\patient\calendrier\edit?id=<?= $event['id'];?>"> <?= h($event['name']); ?> </a> <a href="\phpmed\connexion\patient\calendrier\delete?id=<?= $event['id'];?>"> &#10060 </a>
                </div>


            <?php endforeach; ?>

        </td>
        <?php endforeach; ?>
            
    </tr>



    </table>


    <a href="\phpmed\connexion\patient\calendrier\add" class="calendar__button">+</a>

</div>

<?php require_once 'inc/footer.php';?>




