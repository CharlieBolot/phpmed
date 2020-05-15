<?php

class Medecin{
    public $id;
    public $nom;
    public $prenom;
    public $mdp;
    public $mail;

    public function __construct(array $Medecin){
        $this->hydrate($Medecin);
    }

    public function hydrate(array $Medecin){
        foreach($Medecin as $key => $value){
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

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
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

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }



    
        
    




}