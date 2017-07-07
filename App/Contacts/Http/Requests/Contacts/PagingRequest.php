<?php

namespace App\Contacts\Http\Requests\Contacts;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingRequest extends WithFilter
{
    protected $rules = [
        'page'=>'bail|required|xss|numeric',
        'start'=>'bail|required|xss|numeric',
        'limit'=>'bail|required|xss|numeric',
        'filter'=>'bail|sometimes|json|filter:name,identification,phone1,observations',
        'query'=>'bail|sometimes',
        'sort'=>'bail|sometimes|json|sort:name,email',
    ];
    
    public $rulesFilters = [
        'name'=>'nullable|max:150|xss',
        'identification'=>'nullable|xss',
        'phone1'=>'nullable|xss|numeric',
        'observations'=>'nullable|xss',
    ];
    
}
