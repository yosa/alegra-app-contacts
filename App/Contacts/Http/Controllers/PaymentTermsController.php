<?php

namespace App\Contacts\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Contacts\Http\Requests\PaymentTerms\PagingRequest;
use App\Contacts\Logics\PaymentTerms\PagingLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PaymentTermsController extends Controller
{
    
    public function paging(PagingRequest $request, PagingLogic $logic)
    {
        return $logic->init($request->allValid());
    }
    
}
