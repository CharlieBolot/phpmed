<?php
require_once 'connexion/bdd/bdd.php';

$pdo= get_pdo();
$id=$_SESSION['idpat'];

if(!empty($_POST)){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numtel = $_POST['numtel'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $idprat = $_POST['idprat'];




    

    $req = $pdo->prepare('UPDATE patient SET nom="'.$nom.'",prenom="'.$prenom.'",numtel="'.$numtel.'",adresse="'.$adresse.'",ville="'.$ville.'",cp="'.$cp.'",mail="'.$mail.'",mdp="'.$mdp.'",idprat="'.$idprat.'" WHERE id=:id');
    $req->bindValue('id',$id,PDO::PARAM_INT);
    $req->execute( );
    $data = $req->fetch();

    header('Location: /phpMed/connexion/patient/profil/fiche/');
    
    exit();

    

}

?>