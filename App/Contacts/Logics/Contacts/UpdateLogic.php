<?php

namespace App\Contacts\Logics\Contacts;

/**
 * Update contact
 *
 * @author Luis Josafat Heredia Contreras
 */
class UpdateLogic extends CreateLogic
{
    
    protected $method = 'PUT';
    
    public function executeApi($input)
    {
        $this->endPoint .= '/' . $input['id'];
        return parent::executeApi($input);
    }
    
}
