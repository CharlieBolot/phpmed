<?php

class  Ligne_ordo{
    private $id;
    private $id_medicament;
    private $posologie;
    private $id_ordo;

    public function __construct(array $carac){
        $this->hydrate($carac);
    }

    public function hydrate(array $infordo){
        foreach($infordo as $key => $value){
            if(!empty($value)){
                $method = 'set'.ucfirst($key);
                if(method_exists($this,$method)){
                    // echo $value;
                    $this->$method($value);
                }
            }
        }

    }


    public function getId(){
        return $this->id;
    }
    public function getId_medicament(){
        return $this->id_medicament;
    }
    public function getPosologie(){
        return $this->posologie;
    }
    public function getId_ordo(){
        return $this->id_ordo;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setId_medicament($id_medicament){
        $this->id_medicament = $id_medicament;
    }
    public function setPosologie($posologie){
        $this->posologie = $posologie;
    }
    public function setId_ordo($id_ordo){
        $this->id_ordo = $id_ordo;
    }
}