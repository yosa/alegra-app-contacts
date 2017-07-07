<?php

namespace App\Contacts\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Contacts\Http\Requests\Contacts\PagingRequest;
use App\Contacts\Http\Requests\Contacts\CreateRequest;
use App\Contacts\Http\Requests\Contacts\DeleteRequest;
use App\Contacts\Http\Requests\Contacts\UpdateRequest;
use App\Contacts\Logics\Contacts\PagingLogic;
use App\Contacts\Logics\Contacts\CreateLogic;
use App\Contacts\Logics\Contacts\DeleteLogic;
use App\Contacts\Logics\Contacts\ReportLogic;
use App\Contacts\Logics\Contacts\UpdateLogic;
use App\Contacts\Modules\Universal\Contacts\ReportModule;

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
    
    public function report($id, $format, ReportModule $module, ReportLogic $logic)
    {
        $input = [
            'id'=>$id
        ];
        
        if( $format === 'json') {
            return response()->data($logic->init($input));
        }
        
        return $module
            ->withInput($logic->init($input))
            ->render($id);
    }
    
    public function update(UpdateRequest $request, UpdateLogic $logic)
    {
        return $this->responseJson($logic, $request);
    }
    
}
