<?php
require_once 'connexion/bdd/bdd.php';
$pdo= get_pdo();

// print_r($_POST);
// echo('<br>');

    $message=[];
    $_SESSION['fiche']=[];
    
   
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
                    $message[$i] = $prenom.' '.$nom.' résidant '.$adresse.' '.$ville.' '.$cp.' Tel : '.$numtel.' @Mail : '.'<a href="mailto:?to='.$mail.'">'.$mail.'</a>'.' '.'<a href="/phpMed/connexion/praticien/profil/fiche?id='.$i.'" class="btn btn-outline-dark btn-sm">Fiche patient</a>';
                    $fiche[$i] = [$mail, $nom, $prenom ,$adresse ,$ville , $cp ,$numtel];
                    $_SESSION['fiche'][$i]=$fiche[$i];
                    
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

