<?php

namespace App;

use DateTime;

class Validator{

    private $data;
    protected $errors = [];


    public function __construct(array $data = []){
        $this->data =  $data;
    }

    
    /**
    * @param array $data
    * @return array|bool
    * 
    */

    public function validates(array $data){
        $this->errors = [];
        $this->data = $data;
        return $this->errors;
    }

    public function validate(string $field, string $method, ...$parameters): bool {
        if(!isset($this->data[$field])){
            $this->errors[$field] = "Le champ $field n'est pas rempli";
            return false;

        }else{
            return call_user_func([$this, $method],$field, ...$parameters);
        }
    }


    public function minLength(string $field, int $length): bool{
        if (mb_strlen($field) < $length){
            $this->errors[$field] = "Le champ doit avoir plus de $length caractères";
            return false;
        }
        return true;

    }

    public function date(string $field): bool{
       if( \DateTime::createFromFormat('Y-m-d',$this->data[$field]) === false ) {
           $this->errors[$field] = "La date ne semble pas valide";
            return false;
       }
       return true;

    }
    
    public function time(string $field): bool{
        if( \DateTime::createFromFormat('H:i',$this->data[$field]) === false ) {
            $this->errors[$field] = "Le temps ne semble pas valide";
            return false ;          
        }
        return true;
 
    }

    public function dispo(string $startField,string $field):bool{
        //require_once '../src/bootstrap.php';    
         
        $start =  \DateTime::createFromFormat('H:i',$this->data[$startField]);
        $datestart = \DateTime::createFromFormat('Y-m-d',$this->data[$field]);
        
        $start = $start->format('H:i');
        
        $datestart = $datestart->format('Y-m-d');
        
        $dateinit = $datestart.' '.$start;
        $teststart=explode(':',$start,1);
        $testDayStart = New DateTime($this->data[$field]);
        $testDayStart = $testDayStart->format('w');

        if($testDayStart==0){
            $this->errors[$startField] = "La semaine débute le lundi et se finie le samedi";
            return false;
        }else if($teststart[0]<9||$teststart[0]>18){
            $this->errors[$startField] = "La journée débute à 9h00 et finie à 19h00";
            return false;
        }else{
            $pdo = get_pdo();  
        
            $duree = 20;
            for($h=0;$h<$duree; $h++){
                    $verif = $pdo->prepare('SELECT * FROM events WHERE start ="'.$dateinit.'"');
                    $verif->execute();
                    $data=$verif->fetch();    
                    if(isset($data['start'])){
                        $this->errors[$startField] = "L'horaire est déjà pris";
                        return false;
                    }
                $time = new DateTime($dateinit);
                $time->modify('-1 Minutes');
                $dateinit = $time->format('Y-m-d H:i');
        
            }
        }
    return true;
    }
        
   

    
    
}
