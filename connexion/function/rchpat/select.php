<?php
require_once 'connexion/bdd/bdd.php';

// print_r($_POST);
// echo('<br>');

    $message=[];
    
   
        $query=$pdo->prepare('SELECT * FROM patient WHERE nom = :nom OR prenom = :prenom');
        $query->bindParam(':nom',$_POST['nom'], PDO::PARAM_STR);
        $query->bindParam(':prenom',$_POST['nom'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetchAll();
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';

        $datacount = count($data);
    
        

            if($datacount>0){
                
                for($i = 0; $i < $datacount; $i++){    
                    $mail = $data[$i]['mail'];                    
	                $nom = $data[$i]['nom'];
                    $prenom = $data[$i]['prenom'];
                    $adresse = $data[$i]['adresse'];
                    $ville = $data[$i]['ville'];
                    $cp = $data[$i]['cp'];
                    $numtel = $data[$i]['numtel'];
                    
                    $message[$i] = $prenom.' '.$nom.' résidant '.$adresse.' '.$ville.' '.$cp.' Tel : '.$numtel.' @Mail : '.'<a href="mailto:?to='.$mail.'">'.$mail.'</a>';
                    
                }
                //header('Location:  /phpMed/connexion/praticien/profil'); 
            
            
            }
            else{
                //header('Location: /phpMed/connexion/praticien/wrong');
                $message[0]='pas de résultat trouvé';
            }
        

        $_SESSION['message']=$message;
        
        header('Location:  /phpMed/connexion/praticien/profil');
 
    
?>

