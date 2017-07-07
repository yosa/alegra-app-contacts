@extends('layouts.reports')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="5">Datos generales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Razón social</th>
                        <th>RFC</th>
                        <th>Teléfono</th>
                        <th>Teléfono secundario</th>
                        <th>Celular</th>
                    </tr>
                    <tr>
                        <td>{!! $report->name ?: "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->identification ?: "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->phonePrimary ?: "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->phoneSecondary ?: "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->mobile ?: "<small>No especificado</small>" !!}</td>
                    </tr>
                    <tr>
                        <th>Correo electrónico</th>
                        <th>Fax</th>
                        <th>Lista de precio</th>
                        <th colspan="2">Observaciones</th>
                    </tr>
                    <tr>
                        <td>{!! $report->email ?: "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->fax ?: "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->priceList ? $report->priceList->name: "<small>No especificado</small>" !!}</td>
                        <td colspan="2">{!! $report->observations ?: "<small>No especificado</small>" !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="5">Domicilio fiscal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Calle</th>
                        <th>No. exterior</th>
                        <th>No. interior</th>
                        <th>Código postal</th>
                        <th>Colonia</th>                      
                    </tr>
                    <tr>
                        <td>{!! $report->address->street or "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->address->exteriorNumber or "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->address->interiorNumber or "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->address->zipCode or "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->address->colony or "<small>No especificado</small>" !!}</td>
                    </tr>
                    <tr>
                        <th>Localidad</th>
                        <th>Municipio</th>
                        <th colspan="2">Estado</th>
                        <th>País</th>
                    </tr>
                    <tr>
                        <td>{!! $report->address->locality or "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->address->municipality or "<small>No especificado</small>" !!}</td>
                        <td colspan="2">{!! $report->address->state or "<small>No especificado</small>" !!}</td>
                        <td>{!! $report->address->country or "<small>No especificado</small>" !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="6">Personas asociadas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Celular</th>                        
                        <th>Enviar notificaciones</th>                        
                    </tr>
                @if( !count($report->internalContacts))
                    <tr>
                        <td colspan="6">
                            <small>Sin personas asociadas</small>
                        </td>
                    </tr>
                @else
                    @foreach($report->internalContacts as $contact)
                    <tr>
                        <td>{!! !empty($contact->name) ? $contact->name : "<small>No especificado</small>" !!}</td>
                        <td>{!! !empty($contact->lastName) ? $contact->lastName : "<small>No especificado</small>" !!}</td>
                        <td>{!! !empty($contact->email) ? $contact->email : "<small>No especificado</small>" !!}</td>
                        <td>{!! !empty($contact->phone) ? $contact->phone : "<small>No especificado</small>" !!}</td>
                        <td>{!! !empty($contact->mobile) ? $contact->mobile : "<small>No especificado</small>" !!}</td>
                        <td>
                        @if( is_null($contact->sendNotifications))
                            <small>No especificado</small>
                        @else
                            {{ $contact->sendNotifications ? 'Si' : 'No' }}
                        @endif
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
