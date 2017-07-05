<?php

namespace App\Contacts\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Contacts\Http\Requests\Contacts\PagingRequest;
use App\Contacts\Http\Requests\Contacts\CreateRequest;
use App\Contacts\Http\Requests\Contacts\DeleteRequest;
use App\Contacts\Logics\Contacts\PagingLogic;
use App\Contacts\Logics\Contacts\CreateLogic;
use App\Contacts\Logics\Contacts\DeleteLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ContactsController extends Controller
{
    
    public function paging(PagingRequest $request, PagingLogic $logic)
    {
        return $logic->init($request->allValid());
    }
    
    public function create(CreateRequest $request, CreateLogic $logic)
    {
        return $this->responseJson($logic, $request);
    }
    
    public function delete(DeleteRequest $request, DeleteLogic $logic)
    {
        return $this->responseJson($logic, $request);
    }
    
}
