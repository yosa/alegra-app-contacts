<?php

namespace App\Contacts\Database\Seeds\Modules;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesUniversalSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->contacts();        
        $this->priceList();        
        $this->sellers();        
        $this->paymentTerms();        
    }
    
    public function contacts()
    {
        $this->installModuleJson('Universal/Contacts', [
            'create',
            'delete',
            'paging',
            'report',
            'update',
        ]);
    }
    
    public function paymentTerms()
    {
        $this->installModuleJson('Universal/PaymentTerms', [
            'paging',
        ]);
    }
    
    public function priceList()
    {
        $this->installModuleJson('Universal/PriceList', [
            'paging',
        ]);
    }
    
    public function sellers()
    {
        $this->installModuleJson('Universal/Sellers', [
            'paging',
        ]);
    }
    
}
