<?php
require_once 'connexion/bdd/bdd.php';
$pdo = get_pdo(); 
//var_dump($_POST);
$query=$pdo->prepare('INSERT INTO info_patient(id_pat, info, date) VALUES (:id_pat, :info, :date) ');
$query->execute([
    'id_pat' => $_POST['id_pat'],
    'info' => $_POST['info'],
    'date' => date_timestamp_get(new DateTime()),
]);
$data=$query->fetch();
header('Location: /phpMed/connexion/praticien/profil/fiche?id=0');
    
    exit();

?>
