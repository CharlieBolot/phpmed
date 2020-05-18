<?php
require_once 'connexion/bdd/bdd.php';

print_r($_POST);
$rech = explode(' ',$_POST['nom']);
$nom = $rech[0];
$prenom = $rech[1];


    $message='';
    
   
        $query=$pdo->prepare('SELECT * FROM patient WHERE nom = :nom AND prenom = :prenom');
        $query->bindParam(':nom',$nom, PDO::PARAM_STR);
        $query->bindParam(':prenom',$prenom, PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
        //print_r($data);

        if($data['id']>0){
            $mail = $data['mail'];
	        $nom = $data['nom'];
            $prenom = $data['prenom'];
            $adresse = $data['adresse'];
            $ville = $data['ville'];
            $cp = $data['cp'];
            $numtel = $data['numtel'];
           
           
            $message=$prenom.' '.$nom.' résidant '.$adresse.' '.$ville.' '.$cp.' Tel : '.$numtel.' @Mail : '.'<a href="mailto'.$mail.'">'.$mail.'</a>';
            //header('Location:  /phpMed/connexion/praticien/profil');
           
        
        }
        else{
            //header('Location: /phpMed/connexion/praticien/wrong');
            $message='pas de résultat trouvé';
        }

        $_SESSION['message']=$message;
        header('Location:  /phpMed/connexion/praticien/profil');
 
    
?>

