<?php

namespace App\Contacts\Logics;

use Melisa\core\LogicBusiness;
use App\Contacts\Logics\ApiAlegra;

/**
 * Abstract logic
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class AbstractLogic
{
    use LogicBusiness;
    
    protected $endPoint;
    protected $api;
    protected $method = 'GET';
    
    public function __construct(ApiAlegra $api)
    {
        $this->api = $api;
    }
    
    public function init(array $input)
    {
        $result = $this->executeApi($input);
        
        if( $result === false) {
            return false;
        }
        
        return $this->formartResult($result);
    }
    
    public function formartResult(&$result)
    {
        return $result;
    }
    
    public function executeApi($input)
    {
        return $this->api->execute($this->method, $this->endPoint, $input);
    }
    
}
