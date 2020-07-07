<?php
require_once 'connexion/bdd/bdd.php';
$pdo = get_pdo();

    $message='';
    
   
    $query=$pdo->prepare('SELECT * FROM admin WHERE mail = :mail AND mdp = :mdp');
    $query->bindValue(':mail',$_POST['mail'], PDO::PARAM_STR);
    $query->bindValue(':mdp',$_POST['mdp'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();

        if($data['id']>0){
            $_SESSION['mail'] = $data['mail'];
	        $_SESSION['mdp'] = $data['mdp'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['type']='admin';
            header('Location:  /phpMed/connexion/admin/profil');
        
        }
        else{
            header('Location: /phpMed/connexion/admin/wrong');
        }
 

?>

