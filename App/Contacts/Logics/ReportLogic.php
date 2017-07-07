<?php

namespace App\Contacts\Logics;

/**
 * Patron report logic
 *
 * @author Luis Josafat Heredia Contreras
 */
class ReportLogic extends AbstractLogic
{
    
    protected $method = 'GET';
    
    public function executeApi($input)
    {
        $this->endPoint .= '/' . $input['id'];        
        return parent::executeApi(null);
    }
    
}
