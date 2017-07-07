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
        $this->formatInput($input);
        return parent::executeApi($input);
    }
    
    public function formatInput(&$input)
    {
        $this->formatType($input);
        $this->formatAddress($input);
        $this->formatInternalContacts($input);
    }
    
    public function formatInternalContacts(&$input)
    {
        if( empty($input['internalContacts'])) {
            $input ['internalContacts']= [];
            return;
        }
        
        $input ['internalContacts']= json_decode($input['internalContacts']);
        
        /* format record, in api is necesary send lastName and not lastname */
        foreach($input['internalContacts'] as $i=>&$contact) {
            $contact->lastName = $contact->lastname;
            unset($contact->lastname);
        }
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
    
}
