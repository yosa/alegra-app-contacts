<?php

namespace App\Contacts\Http\Validations\Contacts;

use Melisa\Laravel\Http\Validations\CustomValidation;

/**
 * Validation people field json
 *
 * @author Luis Josafat Heredia Contreras
 */
class InternalContactsValidation extends CustomValidation
{
    
    protected $name = 'custom_internalContacts';
    protected $errorMessage = 'Formato invalido en campo internal contacts';
    protected $rules = [
        'email'=>'nullable|xss|email|max:100',
        'lastname'=>'nullable|xss',
        'phone'=>'nullable|xss',
        'mobile'=>'nullable|xss',
        'sendNotifications'=>'nullable|xss|boolean',
    ];

    /**
     * Validate fields
     * @return boolean
     */
    public function test()
    {
        $rules = $this->rules;
        return function ($name, $value) use ($rules) {
            
            $input = json_decode($value, true);
            
            if(empty($input)) {
                return true;
            }
            
            if( is_null($input)) {
                return false;
            }
            
            $validation = \Validator::make($input[0], $rules);
            
            if( !$validation->passes()) {
                return false;
            }

            return true;
        };
    }
    
}
