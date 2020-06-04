<?php
require_once 'connexion/bdd/bdd.php';

$pdo= get_pdo();

if(empty($_SESSION['id_ordo'])){

    if(!empty($_POST)){


       // $id_ordo =>prendre l'id max et en ajouter 1 
        $req = $pdo->prepare('SELECT MAX(id) FROM ordo '); 
        $req->execute( );
        $data = $req->fetch();
        if(empty($data)){
            $id_ordo=1;
        }
        else{
        $id_ordo = $data['MAX(id)'] + 1 ;
        }
        $_SESSION['id_ordo'] = $id_ordo;
        var_dump($_SESSION['id_ordo']);
    //var_dump($id_ordo);
        $date = date('Y/m/d');  
    //var_dump($date );  
        $idprat = $_SESSION['idprat'];
    //var_dump($idprat );
        $idpat = $_SESSION['fiche'][0][7];
    //var_dump($idpat );
        $idmedoc = $_POST['idmedoc'];
    //var_dump($idmedoc );
        $_SESSION['idmedoc'] = $idmedoc;
        $posologie = $_POST['poso'];
    //var_dump($posologie );

        $req3 = $pdo->prepare('INSERT INTO ordo(id,date,idprat,idpat) VALUES ("'.$id_ordo.'","'.$date.'","'.$idprat.'","'.$idpat.'")');
        $req4 = $pdo->prepare('INSERT INTO ligne_ordo(id_ordo,id_medicament,posologie) VALUES ("'.$id_ordo.'","'.$idmedoc.'","'.$posologie.'")');


        $req3->execute( );
        $data3 = $req3->fetch();
        $req4->execute( );
        $data4 = $req4->fetch();

          header('Location: \phpmed\connexion\praticien\profil\ordo');

          exit();
    }
}
else{
    if(!empty($_POST)){


        // $id_ordo =>prendre l'id max et en ajouter 1 
         $req6 = $pdo->prepare('SELECT MAX(id) FROM ordo '); 
         $req6->execute( );
         $data6 = $req6->fetch();
         $id_ordo = $data6['MAX(id)']; 
         $_SESSION['id_ordo'] = $id_ordo;
     //var_dump($id_ordo); 
         $idmedoc = $_POST['idmedoc'];
     //var_dump($idmedoc );
         $_SESSION['idmedoc'] = $idmedoc;
         $posologie = $_POST['poso'];
     //var_dump($posologie );
         $req5 = $pdo->prepare('INSERT INTO ligne_ordo(id_ordo,id_medicament,posologie) VALUES ("'.$id_ordo.'","'.$idmedoc.'","'.$posologie.'")');
         $req5->execute( );
         $data5 = $req5->fetch();
 
         header('Location: \phpmed\connexion\praticien\profil\ordo');
 
         exit();
     }
}

?>