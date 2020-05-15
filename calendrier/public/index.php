<?php
require_once '../src/bootstrap.php';
require_once '../src/Calendar/Week.php';

$pdo = get_pdo();
$events = new Calendar\Events($pdo); 
//$month = new Calendar\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
$week = new Calendar\Week($_GET['week'] ?? null, $_GET['year'] ?? null);   
//$week->previousMonth(); //=>debug
   
// //$start = $start->format('N') === '1'? $start : $week->getStartingDay()->modify('last monday');
// //$weeks = $week->getWeeks();
// //$end = (clone $start)->modify('+'. (6 + 7 *  ($weeks -1)) .'days');
// Debut de semaine en cours
$start= $week->premierdelasemaine();
// Fin de semaine en cours
$end=(clone $start)->modify("+6 days");
  
    $events = $events->getEventsBetweenByDay($start,$end);
    require_once 'views/header.php';
?>
<div class="calendar">

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?= $week->toString($start->format('m')); ?></h1>

        <?php if ( isset($_GET['success'])): ?>
            <div class="container">
                <div class="alert alert-success">
                    L'action a bien été enregistrée
                </div>
            </div>

        <?php endif; ?>
         <div>
             
            <a href="/phpmed/calendrier/public/index.php?week=<?= $week->previousMonth()->week ?>&year=<?= $week->previousMonth()->year; ?>" class="btn btn-primary"> Mois -1</a>
            <a href="/phpmed/calendrier/public/index.php?week=<?= $week->nextMonth()->week;?>&year=<?= $week->nextMonth()->year; ?>" class="btn btn-primary">Mois +1</a>



            <a href="/phpmed/calendrier/public/index.php?year=<?= $week->previousWeek()->year; ?>&week=<?= $week->previousWeek()->week; ?>" class="btn btn-primary"> semaine -1</a>
            <a href="/phpmed/calendrier/public/index.php?year=<?= $week->nextWeek()->year; ?>&week=<?= $week->nextWeek()->week; ?>" class="btn btn-primary">semaine +1</a>
        </div>

    </div>


    <table class="calendar__table "> <!--calendar__table--\<\?= $weeks; ?>weeks"-->

    

    
    <tr>
        <?php foreach($week->days as $k => $day): 
           $date =  (clone $start)->modify("+" . $k."days");
           $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
           $isToday = date('Y-m-d') === $date->format('Y-m-d');
            ?>
        <td class="<?= $isToday ? 'is-today' : ''; ?> ">
            
            <div class="calendar__weekday"><?= $day; ?></div>
            
            <a class="calendar__day" href="add.php?date=<?= $date->format('Y-m-d'); ?>"><?= $date->format('d'); ?></a>
            <?php foreach ($eventsForDay as $event): ?>
                <div class="calendar__event">
                   <?= (new DateTime($event['start']))->format('H:i') ?> -  <a href="edit.php?id=<?= $event['id'];?>"> <?= h($event['name']); ?> </a> <a href="delete.php?id=<?= $event['id'];?>"> &#10060 </a>
                </div>


            <?php endforeach; ?>

        </td>
        <?php endforeach; ?>
            
    </tr>



    </table>


    <a href="add.php" class="calendar__button">+</a>

</div>

<?php require_once 'views/footer.php';?>




