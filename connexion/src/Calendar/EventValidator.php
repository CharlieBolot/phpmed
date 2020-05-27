<?php
namespace Calendar;


use App\Validator;

require_once 'connexion\src\App\Validator.php';
class EventValidator extends Validator{

    /**
     * @param array $data
     * @return array|bool
     * 
     */

    public function validates(array $data){

        parent::validates($data);
        
        $this->validate('date', 'date');
        $this->validate('start','dispo','date');

        return $this->errors;
    }


}