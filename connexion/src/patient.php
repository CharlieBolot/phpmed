<?php

class Patient{
    public $id;
    public $nom;
    public $prenom;
    public $numtel;
    public $adresse;
    public $ville;
    public $cp;
    public $mdp;
    public $mail;
    public $idprat;

    public function __construct(array $Patient){
        $this->hydrate($Patient);
    }

    public function hydrate(array $Patient){
        foreach($Patient as $key => $value){
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
    public function getNumtel(){
        return $this->numtel;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getCp(){
        return $this->cp;
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
    public function settNumtel($numtel){
        $this->numtel = $numtel;
    }
    public function settAdresse($adresse){
        $this->adresse = $adresse;
    }
    public function settVille($ville){
        $this->ville = $ville;
    }
    public function settCp($cp){
        $this->cp = $cp;
    }
    public function setMdp($mdp){
        $this->mdp = $mdp;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }



    
        
    




}