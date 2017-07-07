<?php

namespace App\Contacts\Http\Validations\Contacts;

use Melisa\Laravel\Http\Validations\CustomValidation;

/**
 * Validation type field json
 *
 * @author Luis Josafat Heredia Contreras
 */
class TypeValidation extends CustomValidation
{
    
    protected $name = 'custom_type';
    protected $errorMessage = 'Formato invalido en campo type';
    
    /**
     * Validate only client and/or provider
     * @return boolean
     */
    public function test()
    {
        return function ($_, $value) {
            
            $inputType = json_decode($value, true, 2);
        
            if( !$inputType || !is_array($inputType)) {
                return false;
            }

            /* http://php.net/array_intersect */
            if( count(array_intersect($inputType, ['client', 'provider'])) 
                == count($inputType)) {
                return true;
            }
            
            return false;            
        };
    }
    
}
