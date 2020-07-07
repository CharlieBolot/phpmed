<?php
require_once 'connexion/bdd/bdd.php';

$pdo= get_pdo();

if(!empty($_POST)){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
   




    

    $req = $pdo->prepare('INSERT INTO praticien(nom,prenom,mail,mdp) VALUES ("'.$nom.'","'.$prenom.'","'.$mail.'","'.$mdp.'")');
    $req->execute( );
    $data = $req->fetch();

    header('Location: /phpMed/connexion/admin/profil');
    
    exit();

    

}

?>