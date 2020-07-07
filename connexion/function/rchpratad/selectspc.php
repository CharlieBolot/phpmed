<?php
require_once 'connexion/bdd/bdd.php';
$pdo= get_pdo();

//print_r($_POST);
$rech = explode(' ',$_POST['nom']);
$nom = $rech[0];
$prenom = $rech[1];


    $message=[];
    
   
        $query=$pdo->prepare('SELECT * FROM praticien WHERE nom = :nom AND prenom = :prenom');
        $query->bindParam(':nom',$nom, PDO::PARAM_STR);
        $query->bindParam(':prenom',$prenom, PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
        //print_r($data);

        if($data['id']>0){
            $id = $data['id'];
            $mail = $data['mail'];
	        $nom = $data['nom'];
            $prenom = $data['prenom'];
            $idpat = $data['id'];
           
            $message[0]=$prenom.' '.$nom.'<br><br>@Mail : '.'<a href="mailto:?to='.$mail.'">'.$mail.'</a>';
            //$fiche = [$data];
            $fiche[0] = [$mail, $nom, $prenom];
            $_SESSION['fiche'][0]=$fiche[0];
            //header('Location:  /phpMed/connexion/admin/profil');
           
        
        }
        else{
            //header('Location: /phpMed/connexion/admin/wrong');
            $message[0]='pas de résultat trouvé';

        }

        $_SESSION['messageprat']=$message;
        //$_SESSION['fiche']=$fiche;
        
        header('Location:  /phpMed/connexion/admin/profil');
 
    
?>

