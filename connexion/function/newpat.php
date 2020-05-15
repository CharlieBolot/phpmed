<?php
require_once 'connexion/bdd/bdd.php';

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




    

    $req = $pdo->prepare('INSERT INTO patient(nom,prenom,numtel,adresse,ville,cp,mail,mdp,idprat) VALUES ("'.$nom.'","'.$prenom.'","'.$numtel.'","'.$adresse.'","'.$ville.'","'.$cp.'","'.$mail.'","'.$mdp.'","'.$idprat.'")');
    $req->execute( );
    $data = $req->fetch();

   
    header('Location: ../success');
    exit();

    

}

?>