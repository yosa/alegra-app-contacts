<?php

namespace App\Contacts\Http\Requests\Contacts;

use App\Contacts\Http\Requests\Banks\CreateRequest;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class UpdateRequest extends CreateRequest
{
    
    /**
     * Reuse input create request
     * @return array
     */
    public function rules()
    {        
        $rules = parent::rules();
        $rules ['id']= 'bail|required|max:36|xss|exists:insurance.customersContacts,id';        
        return $rules;        
    }
    
}
