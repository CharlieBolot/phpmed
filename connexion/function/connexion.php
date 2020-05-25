<?php
require_once 'connexion/bdd/bdd.php';
$pdo = get_pdo();

    $message='';
    
   
        $query=$pdo->prepare('SELECT * FROM patient WHERE mail = :mail');
        $query->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();

        if($data['id']>0){
            $_SESSION['mail'] = $data['mail'];
	        $_SESSION['mdp'] = $data['mdp'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['nom'] = $data['nom'];
	        $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['numtel'] = $data['numtel'];
            $_SESSION['adresse'] = $data['adresse'];
            $_SESSION['ville'] = $data['ville'];
            $_SESSION['cp'] = $data['cp'];
            $_SESSION['idprat'] = $data['idprat'];
            $_SESSION['week'] = date('W');
            $_SESSION['year'] = date('Y');
            $_SESSION['type']='patient';
            header('Location:  /phpMed/connexion/patient/profil');
        
        }
        else{
            header('Location: /phpMed/connexion/patient/wrong');
        }


?>

