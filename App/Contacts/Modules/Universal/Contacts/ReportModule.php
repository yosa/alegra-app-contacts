<?php

namespace App\Contacts\Modules\Universal\Contacts;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ReportModule extends Outbuildings
{
    
    public $layout = 'layouts.contacts.report';

    public function dataDictionary()
    {        
        $input = $this->getInput();        
        if( !$input) {
            return false;
        }
        
        return [
            'pageTitle'=>'Contacto :: ' . $input->id,
            'assets'=>[
                'header'=>$this->asset([
                    'bootstrap.reports',
                    'bootstrap.reports.print',
                    'fontawesome',
                    'app.contacts.contacts.report'
                ])
            ],
            'report'=>$input
        ];        
    }
    
}
