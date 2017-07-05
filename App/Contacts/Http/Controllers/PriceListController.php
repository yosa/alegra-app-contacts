<?php

namespace App\Contacts\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Contacts\Http\Requests\PriceList\PagingRequest;
use App\Contacts\Logics\PriceList\PagingLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PriceListController extends Controller
{
    
    public function paging(PagingRequest $request, PagingLogic $logic)
    {
        return $logic->init($request->allValid());
    }
    
}
