<?php
class Ligne_ordonanceDAO{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }


    /**
     * fait la liste des lignes pour une ordonnance 
     * 
     * @return array
     *     
     */
    public function getListOrdo($id): array{
        
        $listeordo = [];


        $ordo = $this->pdo->prepare('SELECT * FROM ligne_ordo WHERE id_ordo = :id');
        $ordo->bindValue(':id', $id, PDO::PARAM_INT);
        $ordo->execute();

        $data=$ordo->fetchAll();
         foreach($data as $value){
             $listeordo[]=new Ordo($value);
             
        }
        return $listeordo;
    }
}

