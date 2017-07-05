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
                    'idLocal'=>0,
                    'name'=>'Vencimiento manual',
                ],
                [
                    'days'=>'0',
                    'idLocal'=>1,
                    'name'=>'De contado',
                ],
                [
                    'days'=>'8',
                    'idLocal'=>2,
                    'name'=>'8 días',
                ],
                [
                    'days'=>'15',
                    'idLocal'=>3,
                    'name'=>'15 días',
                ],
                [
                    'days'=>'30',
                    'idLocal'=>4,
                    'name'=>'30 días',
                ],
                [
                    'days'=>'60',
                    'idLocal'=>5,
                    'name'=>'60 días',
                ],
            ]
        ];
    }
    
}
