<?php
require_once 'connexion/bdd/bdd.php';
$pdo= get_pdo();

//print_r($_POST);
$rech = explode(' ',$_POST['nom']);
$nom = $rech[0];
$prenom = $rech[1];


    $message=[];
    
   
        $query=$pdo->prepare('SELECT * FROM patient WHERE nom = :nom AND prenom = :prenom');
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
            $adresse = $data['adresse'];
            $ville = $data['ville'];
            $cp = $data['cp'];
            $numtel = $data['numtel'];
            $idpat = $data['id'];
           
            $message[0]=$prenom.' '.$nom.'<br>résidant '.$adresse.' '.$ville.' '.$cp.'<br>Tel : '.$numtel.'<br>@Mail : '.'<a href="mailto:?to='.$mail.'">'.$mail.'</a>'.' '.'<br><a href="/phpMed/connexion/praticien/profil/fiche?id=0" class="btn btn-outline-dark btn-sm">Fiche patient</a>';
            //$fiche = [$data];
            $fiche[0] = [$mail, $nom, $prenom ,$adresse ,$ville , $cp ,$numtel, $idpat];
            $_SESSION['fiche'][0]=$fiche[0];
            //header('Location:  /phpMed/connexion/praticien/profil');
           
        
        }
        else{
            //header('Location: /phpMed/connexion/praticien/wrong');
            $message[0]='pas de résultat trouvé';

        }

        $_SESSION['message']=$message;
        //$_SESSION['fiche']=$fiche;
        
        header('Location:  /phpMed/connexion/praticien/profil');
 
    
?>

