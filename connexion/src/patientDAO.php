<?php
class patientDAO{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    /**
     * fait la liste des patients
     * @return array
     * 
     * 
     */
    public function getList(): array{
        
        $listePatient = [];


        $listepat = $this->pdo->prepare('SELECT * FROM patient ORDER BY nom ASC');
        $listepat->execute();

        $data=$listepat->fetchAll();
         foreach($data as $value){
             $listePatient[]=new Patient($value);
             
        }
        // while ($donnees = $listeprat->fetch(PDO::FETCH_ASSOC)) {
        //     $listeMedecin[] = new Medecin($donnees); 
        // }

        return $listePatient;
    }



    /**
     * retourne les info d'un patient depuis son id
     * @param $id
     * @return Patient 
     */

     public function getpatient($id): Patient{

        $patient = [];
        $pat = $this->pdo->prepare('SELECT * FROM patient WHERE id=:id');
        $pat->bindValue(':id', $id, PDO::PARAM_INT);
        $pat->execute();
        $data=$pat->fetchAll();
        foreach($data as $value){
            $patient=new Patient($value);    
        }
        return $patient;

     }
}