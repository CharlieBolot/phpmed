<?php
require_once 'connexion/bdd/bdd.php';

    $message='';
    
   
        $query=$pdo->prepare('SELECT * FROM praticien WHERE mail = :mail');
        $query->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();

        if($data['id']>0){
            $_SESSION['mail'] = $data['mail'];
	        $_SESSION['mdp'] = $data['mdp'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['nom'] = $data['nom'];
	        $_SESSION['prenom'] = $data['prenom'];
            
            header('Location:  /phpMed/connexion/praticien/profil');
        
        }
        else{
            header('Location: /phpMed/connexion/praticien/wrong');
        }
 

?>

