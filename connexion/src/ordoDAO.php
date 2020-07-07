<?php

class ordoDAO{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    /**
     * fait la liste des ordonnances pour un patient 
     * @return array
     * 
     * 
     */
    public function getList(): array{
        
        $liste_ordo = [];
        $i = $_GET['id'];
        $idpat = $_SESSION['fiche'][$i][7];
        if(isset($_SESSION['idprat'])){
            $idprat = $_SESSION['idprat'];
            



            $ordo = $this->pdo->prepare('SELECT * FROM ordo WHERE idpat = :idpat AND idprat= :idprat');
            $ordo->bindValue(':idpat', $idpat, PDO::PARAM_INT);
            $ordo->bindValue(':idprat', $idprat, PDO::PARAM_INT);
            $ordo->execute();

            $data=$ordo->fetchAll();
             foreach($data as $value){
                 $liste_ordo[]=new Ordo($value);

            }
            return $liste_ordo;
        }
        else{
            $ordo = $this->pdo->prepare('SELECT * FROM ordo WHERE idpat = :idpat');
            $ordo->bindValue(':idpat', $idpat, PDO::PARAM_INT);
            $ordo->execute();

            $data=$ordo->fetchAll();
             foreach($data as $value){
                 $liste_ordo[]=new Ordo($value);

            }
            return $liste_ordo;

        }
    }
}
