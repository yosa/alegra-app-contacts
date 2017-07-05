<?php

namespace App\Contacts\Logics\Contacts;

use App\Contacts\Logics\DeleteLogic as BaseDeleteLogic;

/**
 * Delete contact
 *
 * @author Luis Josafat Heredia Contreras
 */
class DeleteLogic extends BaseDeleteLogic
{
    
    protected $endPoint = 'contacts/';
    
    public function executeApi($input)
    {
        $this->endPoint .= $input['id'];        
        return parent::executeApi(null);
    }
    
}
