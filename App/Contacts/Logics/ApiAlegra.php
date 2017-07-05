<?php

namespace App\Contacts\Logics;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Melisa\core\LogicBusiness;

/**
 * Execute request on api alegra
 *
 * @author Luis Josafat Heredia Contreras
 */
class ApiAlegra
{
    use LogicBusiness;
    
    const HOST = 'https://app.alegra.com/api';
    const VERSION = '/v1/';
    
    public function execute($method = 'GET', $point, $params)
    {
        $client = $this->createClient();
        return $this->runRequest($method, $client, $point, $params);
    }
    
    public function runRequest($method, &$client, $point, $params)
    {
        try {
            if( $method === 'GET') {
                $response = $client->request($method, $point, [
                    'query'=>$params,
                    'headers'=>$this->getHeaders()
                ]);
            } else {
                $response = $client->request($method, $point, [
                    'json'=>$params,
                    'headers'=>$this->getHeaders()
                ]);
            }
        } catch (ClientException $ex) {
            $this->error($ex->getMessage());
            return $this->error('Client exception');
        }
        
        if( !$response) {
            return false;
        }
        
        if( !$this->isValidResponse($response)) {
            return false;
        }
        
        return $this->decodeResponse($response);
    }
    
    public function decodeResponse(&$response)
    {
        $body = $response->getBody();
        return json_decode($body->getContents());
    }
    
    public function isValidResponse(&$response)
    {
        $code = $response->getStatusCode();
        
        switch ($code) {
            case 400:
                return $this->error('El request está mal formado. La información para crear el recurso no existe o es inválida.');
            case 401:
                return $this->error('Error en autenticación. La autenticación fallo o no se encontró la información para autenticar el request.');
            case 402:
                return $this->error('Pago requerido. La acción no se pudo realizar exitosamente ya que la cuenta se encuentra suspendida o el plan actual de la compañía no permite realizar la acción.');
            case 403:
                return $this->error('El usuario no tiene permisos para realizar la acción.');
            case 404:
                return $this->error('No se encontró en la aplicación el recurso que se está buscando. También se retorna cuando la cuenta se encuentra suspendida.');
            case 405:
                return $this->error('Operación no permitida. Ocurre cuando el método del request es inválido para el endpoint requerido.');
            case 201:
                $this->debug('El recurso se creó exitosamente.');
                break;
            case 200:
                $this->debug('Todo funcionó correctamente.');
                break;
            default :
                return $this->error('Ocurrió un error en la aplicación.');
        }
        
        return true;
    }
    
    public function getHeaders()
    {
        return [
            'Authorization'=>env('ALEGRA_AUTHORIZATION')
        ];
    }
    
    public function createClient()
    {
        return new Client([
            'base_uri'=> self::HOST . self::VERSION
        ]);
    }
    
}
