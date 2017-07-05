<?php 

namespace App\Contacts\Modules\Desktop\Contacts;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class AddModule extends Outbuildings
{
    
    public $event = 'contacts.contacts.add.access';
    
    public function dataDictionary()
    {        
        return [
            'success'=>true,
            'data'=>[
                'token'=>csrf_token(),
                'modules'=>[
                    'submit'=>$this->module('task.contacts.contacts.create'),
                    'sellers'=>$this->module('task.contacts.sellers.paging'),
                    'priceList'=>$this->module('task.contacts.priceList.paging'),
                    'terms'=>$this->module('task.contacts.terms.paging'),
                    'settlements'=>$this->module('task.people.settlements.paging'),
                    'paymentTerms'=>$this->module('task.contacts.paymentTerms.paging'),
                ],
                'wrapper'=>[
                    'title'=>'Agregar contacto'
                ],
                'i18n'=>[
                    'success'=>'Contacto creado',
                    'btnSave'=>'Agregar contacto',
                ]
            ]
        ];        
    }
    
}
