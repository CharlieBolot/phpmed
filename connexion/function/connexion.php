<?php
require_once 'connexion/bdd/bdd.php';

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
            header('Location:  /phpMed/connexion/patient/profil');
        
        }
        else{
            header('Location: /phpMed/connexion/patient/wrong');
        }
        

        

/* 	if ($data['mdp'] == md5($_POST['mdp'])) // Acces OK !
	{
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

        //header('Location: ../profil');
	    
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
        pour revenir à la page d accueil</p>';
        header('Location: ../wrong');
	}
    $query->CloseCursor();
     */
    




/* if(!empty($_POST)){


    $req = $pdo->prepare('SELECT * FROM patient WHERE mdp = :mdp AND mail = :mail');
    $req->execute(['mdp' => $_POST['mdp']],['mail' => $_POST['mail']]);
    $data = $req->fetch();

    if(empty($data)){
        echo $data;
        
       //header('Location: ../wrong');
    }else{

    $_SESSION = $data;
    $mail = $_SESSION['mail'];
    $mdp = $_SESSION['mdp'];

 
    header('Location: ../profil');
    exit();

    
    }
} */

?>

