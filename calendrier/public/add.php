<?php
require '../src/bootstrap.php';
$data = [
    'date' => $_GET['date'] ?? date('y-m-d'),
    'start' => date('H:i'),
    'end' => date('H:i')

];
$validator = new \App\Validator($data);
if(!$validator->validate('date','date')){
    $data['date'] = date('y-m-d');
};
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    $errors = [];
    $validator = new Calendar\EventValidator();
    $errors = $validator->validates($_POST);
    if(empty($errors)){
        $events = new \Calendar\Events(get_pdo());
        $event = $events->hydrate(new \Calendar\Event(),$data);
        $events->create($event);
        header('Location: index?success=1');
        exit ();
    }

}
render('header.php', ['title' => 'Ajouter un évenement']);
?>




<div class="container">

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            Merci de corriger vos erreurs
    
    <?php endif; ?>




    <h1> Ajouter un évènement    </h1>
    <form action="" method="post" class="form">
        <?php render('calendar/form.php',['data' => $data, 'errors' => $errors]); ?>
    
            <div class="form-group">
                <button class="btn btn-primary">Ajouter l'évènement</button>
            </div>
        </div>
    </form>

</div>



<?php
render('footer.php');
?>

