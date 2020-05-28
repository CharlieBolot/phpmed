<?php
require_once 'connexion/bdd/bdd.php';
require_once 'connexion\src\Calendar\EventValidator.php';
require_once 'connexion\src\Calendar\Event.php';
require_once 'connexion\src\Calendar\Events.php';
$type = $_SESSION['type'];
if(isset($_SESSION['idpat'])){
    $idpat = $_SESSION['idpat'];
}else{
    $idpat = '';
};
$idprat = $_SESSION['idprat'];

$data = [
    'date' => $_GET['date'] ?? date('y-m-d'),
    'start' => date('H:i'),
    'end' => date('H:i'),
    'idpat' => $idpat,
    'idprat' => $idprat

];

if($type != 'praticien'){

    $validator = new \App\Validator($data);
    if(!$validator->validate('date','date')){
        $data['date'] = date('y-m-d');
    };
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = $_POST;
        //var_dump($data);
        $errors = [];
        $validator = new Calendar\EventValidator();
        $errors = $validator->validates($_POST);
        if(empty($errors)){
            $events = new \Calendar\Events(get_pdo());
            $event = $events->hydrate(new \Calendar\Event(),$data);
            $events->create($event);
            //var_dump($event);
            header('Location: /phpmed/connexion/'.$type.'/calendrier/success');
            exit ();
        }

    }
    render('inc/header.php', ['title' => 'Ajouter un évenement']);
    ?>
    <div class="container">

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                Merci de corriger vos erreurs
            </div>
        
        <?php endif; ?>
        <h1> Prendre un rendez-vous :    </h1>
        <form action="" method="post" class="form">
            <?php render('connexion/views/calendrier/public/views/calendar/form.php',['data' => $data, 'errors' => $errors]); ?>
        
                <div class="form-group">
                    <button class="btn btn-primary">Ajouter le rendez-vous</button>
                </div>
            </div>
        </form>

    </div>



    <?php
    render('inc/footer.php');


}else{

    $validator = new \App\Validator($data);
    if(!$validator->validate('date','date')){
        $data['date'] = date('y-m-d');
    };
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $data = $_POST;
        //var_dump($data);
        $errors = [];
        $validator = new Calendar\EventValidator();
        $errors = $validator->validates($_POST);
        if(empty($errors)){
            $events = new \Calendar\Events(get_pdo());
            $event = $events->hydrate(new \Calendar\Event(),$data);
            $events->create($event);
            //var_dump($event);
            header('Location: /phpmed/connexion/'.$type.'/calendrier/success');
            exit ();
        }

    }
    render('inc/header.php', ['title' => 'Ajouter un évenement']);
    ?>
    <div class="container">

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                Merci de corriger vos erreurs
            </div>
        
        <?php endif; ?>
        <h1> Prendre un rendez-vous :    </h1>
        <form action="" method="post" class="form">
            <?php render('connexion/views/calendrier/public/views/calendar/formprat.php',['data' => $data, 'errors' => $errors]); ?>
        
                <div class="form-group">
                    <button class="btn btn-primary">Ajouter le rendez-vous</button>
                </div>
            </div>
        </form>

    </div>



    <?php
    render('inc/footer.php');


}