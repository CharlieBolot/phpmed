<?php
require_once 'connexion/bdd/bdd.php';
$pdo= get_pdo();

// print_r($_POST);
// echo('<br>');

    $message=[];
    $_SESSION['fiche']=[];
    
   
        $query=$pdo->prepare('SELECT * FROM praticien WHERE nom = :nom OR prenom = :prenom');
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
                    $idpat = $data[$i]['id'];
                    $message[$i] = $prenom.' '.$nom.'<br>@Mail : '.'<a href="mailto:?to='.$mail.'">'.$mail.'</a>'.' '.'<br>';
                    $fiche[$i] = [$mail, $nom, $prenom ,$adresse ,$ville ,$cp ,$numtel ,$idpat];
                    $_SESSION['fiche'][$i]=$fiche[$i];
                    
                    
                }
                //header('Location:  /phpMed/connexion/admin/profil'); 
            
            
            }
            else{
                //header('Location: /phpMed/connexion/admin/wrong');
                $message[0]='pas de résultat trouvé';
            }
        

        $_SESSION['messageprat']=$message;
        
        header('Location:  /phpMed/connexion/admin/profil');
 
    
?>

