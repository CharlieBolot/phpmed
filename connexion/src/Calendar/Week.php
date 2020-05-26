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
        
        $date=$this->premierdelasemaine();
        
        $this->week = $week;
        $this->year = $year;
        $month=$date->format('m');

        $this->month = $month;
        
        
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
            $lastweek = $firstweek->modify('+52 Weeks');
            $test = intval($lastweek->format('Y'));            
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
     * Renvoi le 1er jour de la semaine 
     * @return DateTime
     * 
     */

    public function premierdelasemaine(): DateTime{
        // Obtenir le premier jour de la premiere semaine de l'année en cours
        $begin = new DateTime("{$this->year}-01-01");
        $week = $this->week;
         
        $i=1;
            if ($begin->format('w')!=1) {
                $begin->modify("next monday");
                $i+=1;
            }
         
        return $begin->modify("+".($week-$i)." weeks");
    }
 
    /**
     * 
     * Renvoi le mois suivant
     * @return Week
     * 
     */
    public function nextMonth(): Week{
        
        $dateact = $this->premierdelasemaine();
        $moisSuivant=(clone $dateact)->modify("+ 1 month");
        return new Week(intval($moisSuivant->format('W')),intval($moisSuivant->format('Y')));

        

    }

    /**
     * 
     * Renvoi le mois précédent
     * @param Month
     * @return Week
     */
    public function previousMonth(): Week{


       
            
            $dateact = $this->premierdelasemaine();
            $moisPrecedent=(clone $dateact)->modify("- 1 month + 1 weeks");
            return new Week(intval($moisPrecedent->format('W')),intval($moisPrecedent->format('Y')));


    }

}



?>