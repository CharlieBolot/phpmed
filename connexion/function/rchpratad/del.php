<?php
require_once 'connexion/bdd/bdd.php';
$pdo= get_pdo();



 
  
    
   
        $query=$pdo->prepare('DELETE FROM praticien WHERE id = :id');
        $query->bindParam(':id',$_POST['id'], PDO::PARAM_STR);
        
        $query->execute();
        $data=$query->fetchAll();
        
        header('Location:  /phpMed/connexion/admin/profil');
 
    
?>

