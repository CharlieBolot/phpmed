<?php
class OrdonanceDAO{
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
        
        $listeordo = [];
        $idpat = $_GET['id'];
        $idprat = $_SESSION['idprat'];


        $ordo = $this->pdo->prepare('SELECT * FROM ordo WHERE idpat = :idpat AND idprat= :=idprat');
        $ordo->bindValue(':idpat', $idpat, PDO::PARAM_INT);
        $ordo->bindValue(':idprat', $idprat, PDO::PARAM_INT);
        $ordo->execute();

        $data=$ordo->fetchAll();
         foreach($data as $value){
             $listeordo[]=new Ordo($value);
             
        }
        return $listeordo;
    }
}
