<?php
class medicamentDAO{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }


   /**
     * affiche le nom du medicament d'une ligne
     * @return array
     */
    public function getMedoc($idmedoc):array{
        $medoc =[];

        $medicament = $this->pdo->prepare('SELECT nom FROM medicament WHERE id_medicament = :id');
        $medicament->bindValue(':id', $idmedoc, PDO::PARAM_INT);
        $medicament->execute();

        $data=$medicament->fetch();
        $medoc[]= $data;
        return $medoc;
    }

    
    /**
     * fait la liste des medicaments
     * @return array
     * 
     * 
     */
    public function getList(): array{
        
        $listemedoc = [];


        $listem = $this->pdo->prepare('SELECT * FROM medicament ORDER BY nom ASC');
        $listem->execute();

        $data=$listem->fetchAll();
         foreach($data as $value){
             $listemedoc[]=new Medicament($value);
             
        }
        return $listemedoc;
    }


}

