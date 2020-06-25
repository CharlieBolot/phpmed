<?php

class  info_patient{
    private $id;
    private $id_pat;
    private $info;
    private $date;

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
    public function getId_pat(){
        return $this->id_pat;
    }
    public function getInfo(){
        return $this->info;
    }
    public function getDate(){
        return $this->date;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setId_pat($id_pat){
        $this->id_pat = $id_pat;
    }
    public function setInfo($info){
        $this->info = $info;
    }
    public function setDate($date){
        $this->date = $date;
    }
}