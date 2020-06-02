<?php

class  Ordo{
    public $id;
    public $date;
    public $ligne;
    public $idprat;
    public $idpat;

    public function __construct(array $carac){
        $this->hydrate($carac);
    }

    public function hydrate(array $infordo){
        foreach($infordo as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                // echo $value;
                $this->$method($value);
            }
        }

    }

    public function getId(){
        return $this->id;
    }
    public function getDate(){
        return $this->date;
    }
    public function getLigne(){
        return $this->ligne;
    }
    public function getIdprat(){
        return $this->idprat;
    }
    public function getIdpat(){
        return $this->idpat;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function setLigne($ligne){
        $this->ligne = $ligne;
    }
    public function setIdprat($idprat){
        $this->idprat = $idprat;
    }
    public function setIdpat($idpat){
        $this->idpat = $idpat;
    }

}