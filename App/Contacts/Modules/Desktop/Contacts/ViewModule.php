<?php

namespace App\Contacts\Modules\Desktop\Contacts;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewModule extends Outbuildings
{
    
    public $event = 'contacts.contacts.view.access';

    public function dataDictionary()
    {        
        return [
            'success'=>true,
            'data'=>[
                'token'=>csrf_token(),
                'modules'=>[
                    'contacts'=>$this->module('task.contacts.contacts.paging'),
                    'report'=>$this->module('task.contacts.contacts.report'),
                    'update'=>$this->module('task.contacts.contacts.update.access', false),
                    'add'=>$this->module('task.contacts.contacts.add.access', false),
                    'delete'=>$this->module('task.contacts.contacts.delete', false),
                ],
                'wrapper'=>[
                    'title'=>'Contactos'
                ]
            ]
        ];        
    }
    
}
