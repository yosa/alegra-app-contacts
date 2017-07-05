<?php

namespace App\Contacts\Logics\PriceList;

use App\Contacts\Logics\PagingLogic as BasePagingLogic;

/**
 * Paging price list
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingLogic extends BasePagingLogic
{
    
    protected $endPoint = 'price-lists';   
    
}
