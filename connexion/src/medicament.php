<?php

class Medicament{
    public $id_medicament;
    public $nom;
    public $fabricant;
    public $molecule;
    

    public function __construct(array $medicament){
        $this->hydrate($medicament);
    }

    public function hydrate(array $medicament){
        foreach($medicament as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                // echo $value;
                $this->$method($value);
            }
        }

    }

    public function getId_medicament(){
        return $this->id_medicament;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getFabricant(){
        return $this->fabricant;
    }
    public function getMolecule(){
        return $this->molecule;
    }
    public function setId_medicament($id_medicament){
        $this->id_medicament = $id_medicament;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setFabricant($fabricant){
        $this->fabricant = $fabricant;
    }
    public function setMolecule($molecule){
        $this->molecule = $molecule;
    }
    
}