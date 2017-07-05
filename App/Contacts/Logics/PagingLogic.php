<?php

namespace App\Contacts\Logics;

/**
 * Patron pagin logic
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingLogic extends AbstractLogic
{
    
    protected $method = 'GET';
    
    public function formartResult(&$result)
    {
        return [
            'data'=>$result,
            'total'=>count($result)
        ];
    }
    
}
