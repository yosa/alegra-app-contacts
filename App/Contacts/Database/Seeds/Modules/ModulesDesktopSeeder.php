<?php

namespace App\Contacts\Database\Seeds\Modules;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesDesktopSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->contacts();        
    }
    
    public function contacts()
    {
        $this->installModuleJson('Desktop/Contacts', [
            'add',
            'view',
            'update',
        ]);
        $this->installAssetCss('app.contacts.contacts.report', [
            'name'=>'CSS report contact',
            'path'=>'/contacts/css/contacts-report.css',
        ]);
    }
    
}
