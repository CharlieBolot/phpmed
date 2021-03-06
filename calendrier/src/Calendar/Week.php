<?php

namespace Calendar;

use DateTime;

class Week{

    public $days = ['lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    
    
    
    
   


    public $month;
    public $year;
    public $week;

    /**
     * Week constructor
     * @param int $week la semaine entre 1 et 52 ou 53
     * @param int $year l'annee
     * @throws \Exception
     */

    public function __construct(?int  $week = null,?int  $year = null)
    {
        
        if ($week === null ){
            $week =intval(date('W'));
        }
        if ($year === null ){
            $year =intval(date('Y'));
        }
        
        $date=new DateTime("{$year}-01-01");
        if ($date->format('w')!=1) $date->modify("next monday");
        $date->modify("+".($week-1)." weeks");
        $month=$date->format('m');

        $this->month = $month;
        $this->week = $week;
        $this->year = $year;
        
    
        
        
    }

    /**
     * Renvoi le 1er jour du mois
     * @return \DateTime
     * 
     * 
     */

public function getStartingDay() : \DateTime{
    return new \DateTime("{$this->year}-{$this->month}-01");
}


    /**
     * retourne le mois en toute lettre 
     * @return string
     */


    public function toString($start): string {
        $month = $start;
        $months =['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'];
        return $months[$month - 1] .' '.$this->year;

    }

   
        
       







    /**
     * 
     * Renvoi la semaine précédente
     * @return Week
     * 
     */
    public function previousWeek() {
        $week = $this->week - 1;
        $year = $this->year;
        if($week==0){
            $pyear=$year-1;
            $firstweek = New DateTime("{$pyear}-01-01");
            if($firstweek->format('w')!=1) $firstweek->modify("next monday");
           // print_r($firstweek);=>debug
           // echo('<br>');=>debug
            $lastweek = $firstweek->modify('+52 Weeks');
           // print_r($lastweek);=>debug
            $test = intval($lastweek->format('Y'));
           // echo($test.'<br>');=>debug
            //echo($year);=>debug
            
                if($year == $test){
                    $week = 52;
                }else{
                    $week = 53;
                }

            $year -=1;

        }
                
        
        return new Week($week, $year);

    }



    
     /**
     * 
     * Renvoi la semaine suivante
     * @return Week
     * 
     */
    public function nextWeek() {
        $week = $this->week + 1; 
        $year = $this->year;
        if($week==53){
            
            
            $firstweek = New DateTime("{$year}-01-01");
            if($firstweek->format('w')!=1) $firstweek->modify("next monday");
            $lastweek = $firstweek->modify('+52 weeks');     
            $test = intval($lastweek->format('Y'));
            
            
                if($year != $test){ 
                    $week = 1;
                    $year +=1;
                 };  

        }elseif($week>53){
            $week = 1;
            $year +=1;
        }
        return new Week($week, $year);
    }

    /**
     * 
     * Renvoi le 1er de la semaine voulue
     * @return DateTime
     * 
     */

    public function premierdelasemaine(): DateTime{
        // Obtenir le premier jour de la premiere semaine de l'année en cours
        $begin = new DateTime("{$this->year}-01-01");
         
        if ($begin->format('w')!=1) $begin->modify("next monday");
         
        return $begin->modify("+".($this->week-1)." weeks");
    }



    
    /**
     * 
     * Renvoi le mois suivant
     * @return Week
     * 
     */
    public function nextMonth(): Week{
        $week = $this->week;
        $year = $this->year;


        $begin = new DateTime("{$this->year}-01-01");
         
        if ($begin->format('w')!=1) $begin->modify("next monday");
         
        $dateact = $begin->modify("+".($this->week-1)." weeks");

        $moisfin = $dateact->modify("next month");

        $moisfin = intval($moisfin->format('m'));

        //tant que le mois 'm' ne change pas on ajoute des semaines
       do{
            $begin = new DateTime("{$this->year}-01-01");
            if ($begin->format('w')!=1) $begin->modify("next monday");
            $dateact = $begin->modify("+".($week-1)." weeks");
            $moisdebut = intval($dateact->format('m'));
            $week += 1;
            if($week==53){
            
            
                $firstweek = New DateTime("{$year}-01-01");
                if($firstweek->format('w')!=1) $firstweek->modify("next monday");
                $lastweek = $firstweek->modify('+52 weeks');     
                $test = intval($lastweek->format('Y'));
                
                
                    if($year != $test){ 
                        $week = 1;
                        $year +=1;
                     };  
    
            }elseif($week>53){
                $week = 1;
                $year +=1;
            }

        }while ($moisdebut !=  $moisfin);

        //si le mois d'arrivé est janvier c'est qu'on a changé d'année

        
        $week-=1;

        return new Week($week, $year);

    }

    /**
     * 
     * Renvoi le mois précédent
     * @param Month
     * 
     */
    public function previousMonth(): Week{
        $week = $this->week;
        $year = $this->year;


        $begin = new DateTime("{$this->year}-01-01");
         
        if ($begin->format('w')!=1) $begin->modify("next monday");
         
        $dateact = $begin->modify("+".($this->week-1)." weeks");

        $moisfin = $dateact->modify("previous month");
        $moisfin = $moisfin->modify("previous month");
        if ($moisfin->format('w')!=1) $moisfin->modify("next monday");

        $moisfin = intval($moisfin->format('m'));

        //tant que le mois 'm' ne change pas on retire des semaines
       do{
            $begin = new DateTime("{$this->year}-01-01");
            if ($begin->format('w')!=1) $begin->modify("next monday");
            $dateact = $begin->modify("+".($week-1)." weeks");
            $moisdebut = $dateact;
            if ($moisdebut->format('w')!=1) $begin->modify("next monday");
            $moisdebut = intval($dateact->format('m'));
            $week -= 1;
            if($week==0){
                $pyear=$year-1;
                $firstweek = New DateTime("{$pyear}-01-01");
                if($firstweek->format('w')!=1) $firstweek->modify("next monday");
                $lastweek = $firstweek->modify('+52 Weeks');
               
                $test = intval($lastweek->format('Y'));
              
                    if($year == $test){
                        $week = 52;
                    }else{
                        $week = 53;
                    }
    
                $year -=1;
    
            }
            
        }while ($moisdebut !=  $moisfin);

        //si le mois d'arrivé est janvier c'est qu'on a changé d'année
        
        $week+=2;

        return new Week($week, $year);

        

    }
   




}



?>