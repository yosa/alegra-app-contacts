<?php

namespace App\Contacts\Logics\PaymentTerms;

/**
 * Paging sellers
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingLogic
{
    
    public function init(array $input)
    {
        return [
            'data'=>[
                [
                    'days'=>'Vencimiento manual',
                    'id'=>0,
                    'name'=>'Vencimiento manual',
                ],
                [
                    'days'=>'0',
                    'id'=>1,
                    'name'=>'De contado',
                ],
                [
                    'days'=>'8',
                    'id'=>2,
                    'name'=>'8 días',
                ],
                [
                    'days'=>'15',
                    'id'=>3,
                    'name'=>'15 días',
                ],
                [
                    'days'=>'30',
                    'id'=>4,
                    'name'=>'30 días',
                ],
                [
                    'days'=>'60',
                    'id'=>5,
                    'name'=>'60 días',
                ],
            ]
        ];
    }
    
}
