<?php
class medecinDAO{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    /**
     * fait la liste des medecins
     * @return array
     * 
     * 
     */
    public function getList(): array{
        
        $listeMedecin = [];


        $listeprat = $this->pdo->prepare('SELECT * FROM praticien');
        $listeprat->execute();

        $data=$listeprat->fetchAll();
         foreach($data as $value){
             $listeMedecin[]=new Medecin($value);
             
        }
        // while ($donnees = $listeprat->fetch(PDO::FETCH_ASSOC)) {
        //     $listeMedecin[] = new Medecin($donnees); 
        // }

        return $listeMedecin;
    }



    /**
     * retourne les info d'un medecin depuis son id
     * @param $id
     * @return Medecin 
     */

     public function getmedecin($id): Medecin{

        $medecin = [];
        $prat = $this->pdo->prepare('SELECT * FROM praticien WHERE id=:id');
        $prat->bindValue(':id', $id, PDO::PARAM_INT);
        $prat->execute();
        $data=$prat->fetchAll();
        foreach($data as $value){
            $medecin=new Medecin($value);    
        }
        return $medecin;

     }
}