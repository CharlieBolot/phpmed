<?php
require_once 'connexion/bdd/bdd.php';
$pdo = get_pdo(); 
//var_dump($_POST);
$query=$pdo->prepare('DELETE FROM info_patient WHERE id = :id');
$query->execute([
    'id' => $_GET['id'],
]);
$data=$query->fetch();
header('Location: /phpMed/connexion/praticien/profil/fiche?id=0');
    
    exit();
    
?>
