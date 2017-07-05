<?php

namespace App\Contacts\Logics\Contacts;

use App\Contacts\Logics\PagingLogic as BasePagingLogic;

/**
 * Paging contacts
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingLogic extends BasePagingLogic
{
    
    protected $endPoint = 'contacts';

    public function init(array $input)
    {
        /* is necesary string get total */
        $input ['metadata']= 'true';
        
        return parent::init($input);
    }
    
    public function formartResult(&$result)
    {
        return [
            'data'=>$result->data,
            'total'=>$result->metadata->total
        ];
    }
    
}
