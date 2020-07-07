<?php

class Admin{
    public $id;
    public $mdp;
    public $mail;

    public function __construct(array $Admin){
        $this->hydrate($Admin);
    }

    public function hydrate(array $Admin){
        foreach($Admin as $key => $value){
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

    public function getMdp(){
        return $this->mdp;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

}