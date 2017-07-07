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
        $this->applyFilter($input);
        $this->applySort($input);
        return parent::init($input);
    }
    
    public function applySort(&$input)
    {
        if( !isset($input['sort'])) {
            return;
        }
        
        $sort = json_decode($input['sort'])[0];
        $input ['order_direction']= $sort->direction;
        $input ['order_field']= $sort->property;
        unset($input['sort']);
    }
    
    public function applyFilter(&$input)
    {
        if( !isset($input['filter'])) {
            return;
        }
        
        foreach($input['filter'] as $filter) {
            /* api only support one filter name */
            if( $filter->property !== 'name') {
                continue;
            }
            $input ['query']= $filter->value;
        }
    }
    
    public function formartResult(&$result)
    {
        return [
            'data'=>$result->data,
            'total'=>$result->metadata->total
        ];
    }
    
}
