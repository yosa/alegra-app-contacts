<?php

namespace App\Contacts\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Contacts\Http\Requests\Sellers\PagingRequest;
use App\Contacts\Logics\Sellers\PagingLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class SellersController extends Controller
{
    
    public function paging(PagingRequest $request, PagingLogic $logic)
    {
        return $logic->init($request->allValid());
    }
    
}
