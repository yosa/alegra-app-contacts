<?php

namespace App\Contacts\Logics\Contacts;

use App\Contacts\Logics\CreateLogic as BaseCreateLogic;

/**
 * Create contact
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateLogic extends BaseCreateLogic
{
    
    protected $endPoint = 'contacts';
    
    public function executeApi($input)
    {
        if( !$this->isValid($input)) {
            return false;
        }
        
        $this->formatInput($input);
        return parent::executeApi($input);
    }
    
    public function formatInput(&$input)
    {
        $this->formatType($input);
        $this->formatAddress($input);
    }
    
    public function formatType(&$input)
    {
        if( empty($input['type'])) {
            $input ['type']= [];
        } else {
            $input ['type']= json_decode($input['type']);
        }
    }
    
    public function formatAddress(&$input)
    {
        $obj = new \stdClass();
        $obj->address = $input['address'];
        $obj->city = $input['city'];
        $obj->street = $input['street'];
        $obj->exteriorNumber = $input['exteriorNumber'];
        $obj->interiorNumber = $input['interiorNumber'];
        $obj->colony = $input['colony'];
        $obj->country = $input['country'];
        $obj->locality = $input['locality'];
        $obj->municipality = $input['municipality'];
        $obj->state = $input['state'];
        $obj->zipCode = $input['zipCode'];
        
        $input ['address']= $obj;
        unset(
            $input['city'], 
            $input['street'],
            $input['exteriorNumber'],
            $input['interiorNumber'],
            $input['colony'],
            $input['country'],
            $input['locality'],
            $input['municipality'],
            $input['state'],
            $input['zipCode']            
        );
    }
    
    public function isValid(&$input)
    {
        if( isset($input['type']) && !$this->isValidType($input['type'])) {
            return false;
        }
        
        return true;
    }
    
    public function isValidType($type)
    {
        $inputType = json_decode($type, true, 2);
        
        if( !$inputType || !is_array($inputType)) {
            return $this->error('Dato invalido en el campo type');
        }
        
        /* http://php.net/array_intersect */
        if( count(array_intersect($inputType, ['client', 'provider'])) 
            == count($inputType)) {
            return true;
        }
        
        return $this->error('Dato invalido en el campo tipo de contacto, solo se permite client y provider');
    }
    
}
