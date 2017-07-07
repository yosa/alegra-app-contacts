<?php

namespace App\Contacts\Http\Requests\Contacts;

use App\Contacts\Http\Requests\Contacts\CreateRequest;

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
        $rules ['id']= 'required';        
        return $rules;        
    }
    
}
