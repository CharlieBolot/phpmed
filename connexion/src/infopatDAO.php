<?php
class info_patientDAO{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }


    /**
     * fait la liste des infos pour un patient 
     * 
     * @return array
     *     
     */
    public function getListInfo(): array{
        
        $listinfo = [];
        $i = $_GET['id'];
        $idpat = $_SESSION['fiche'][$i][7];



        $info = $this->pdo->prepare('SELECT * FROM info_patient WHERE id_pat = :idpat');
        $info->bindValue(':idpat', $idpat, PDO::PARAM_INT);
        $info->execute();

        $data=$info->fetchAll();
         foreach($data as $value){
             $listinfo[]=new info_patient($value);
             
        }
        return $listinfo;
    }

    
}

