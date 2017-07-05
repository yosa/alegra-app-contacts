<?php

namespace App\Contacts\Modules\Desktop\Contacts;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class UpdateModule extends Outbuildings
{
    
    public $event = 'contacts.contacts.update.access';
    
    public function dataDictionary()
    {        
        return [
            'success'=>true,
            'data'=>[
                'token'=>csrf_token(),
                'modules'=>[
                    'submit'=>$this->module('task.contacts.contacts.update'),
                    'report'=>$this->module('task.contacts.contacts.report'),
                ],
                'wrapper'=>[
                    'title'=>'Modificar contacto'
                ],
                'i18n'=>[
                    'success'=>'Contacto modificado'
                ]
            ]
        ];        
    }
    
}
