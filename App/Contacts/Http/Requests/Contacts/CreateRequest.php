<?php

namespace App\Contacts\Http\Requests\Contacts;

use Melisa\Laravel\Http\Requests\Generic;
use Melisa\Sanitizes\BeforeSanitize;
use App\Contacts\Http\Validations\Contacts\TypeValidation;
use App\Contacts\Http\Validations\Contacts\InternalContactsValidation;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateRequest extends Generic
{
    use BeforeSanitize;
    
    protected $rules = [        
        'name'=>'required|xss',
        'identification'=>'required|xss',
        'phonePrimary'=>'nullable|xss|max:45',
        'phoneSecondary'=>'nullable|xss|max:45',
        'fax'=>'nullable|xss|max:45',
        'mobile'=>'nullable|xss|max:45',
        'observations'=>'nullable|xss|max:500',
        'email'=>'nullable|xss|email|max:100',
        'priceList'=>'nullable|xss',
        'seller'=>'nullable|xss',
        'term'=>'nullable|xss',
        'city'=>'nullable|xss',
        'street'=>'nullable|xss',
        'exteriorNumber'=>'nullable|xss',
        'interiorNumber'=>'nullable|xss',
        'colony'=>'nullable|xss',
        'country'=>'nullable|xss',
        'locality'=>'nullable|xss',
        'municipality'=>'nullable|xss',
        'state'=>'nullable|xss',
        'zipCode'=>'nullable|xss',
        'type'=>'nullable|xss|json|custom_type',
        'internalContacts'=>'nullable|xss|json|custom_internalContacts',
    ];
    
    protected $sanitizes = [];
    
    public function applicableValidations()
    {
        return collect([
            new TypeValidation(),
            new InternalContactsValidation()
        ]);
    }
    
}
