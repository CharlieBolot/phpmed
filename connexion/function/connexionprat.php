<?php
require_once 'connexion/bdd/bdd.php';
$pdo = get_pdo();

    $message='';
    
   
    $query=$pdo->prepare('SELECT * FROM praticien WHERE mail = :mail AND mdp = :mdp');
    $query->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);
    $query->bindValue(':mdp',$_POST['mdp'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();

        if($data['id']>0){
            $_SESSION['mail'] = $data['mail'];
	        $_SESSION['mdp'] = $data['mdp'];
            $_SESSION['idprat'] = $data['id'];
            $_SESSION['nom'] = $data['nom'];
	        $_SESSION['prenom'] = $data['prenom'];
            $_SESSION['type']='praticien';
            header('Location:  /phpMed/connexion/praticien/profil');
        
        }
        else{
            header('Location: /phpMed/connexion/praticien/wrong');
        }
 

?>

