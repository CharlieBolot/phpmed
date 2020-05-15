<?php
require_once 'connexion/bdd/bdd.php';

    $message='';
    
   
        $query=$pdo->prepare('SELECT * FROM patient WHERE nom = :nom OR prenom = :prenom');
        $query->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
        $query->bindValue(':prenom',$_POST['prenom'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();

        if($data['id']>0){
            $mail = $data['mail'];
	        $nom = $data['nom'];
            $prenom = $data['prenom'];
            $adresse = $data['adresse'];
            $ville = $data['ville'];
            $cp = $data['cp'];
            $numtel = $data['numtel'];
           
            $message=$prenom.' '.$nom.' Résidant '.$adresse.' '.$ville.' '.$cp.' Tel : '.$numtel.' @Mail : '.'<a href="mailto'.$mail.'">'.$mail.'</a>';
           // header('Location:  /phpMed/connexion/praticien/profil');
        
        }
        else{
            //header('Location: /phpMed/connexion/praticien/wrong');
            $message='pas de résultat trouvé';
        }

        return $message;
 

?>

