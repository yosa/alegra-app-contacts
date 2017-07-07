<?php

namespace App\Contacts\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ApplicationSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->installApplication('contacts', [
            'name'=>'Contacts',
            'description'=>'Application Contacts',
            'nameSpace'=>'Alegra.contacts',
            'typeSecurity'=>'art',
            'version'=>'1.0.0'
        ]);        
    }
    
}
