@extends('layout')

@section('content')
<h1>
    Solicitudes <small>({{ $proyecto->nombre }})</small>
    <a href="{{ route('proyectos.solicitudes.create', $proyecto->id) }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nueva Solicitud</a>
</h1>
<hr>
<div class="table-responsive">
    @if(count($proyecto->solicitudes))
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Fecha de Solicitud</th>
                <th>Descripción</th>
                <th>Solicitante</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyecto->solicitudes as $solicitud)
            <tr>
                <td>
                    <a href="{{ route('proyectos.solicitudes.show', [$proyecto,$solicitud]) }}">
                        {{ $solicitud->id }}
                    </a>
                </td>
                <td>{{ $solicitud->fecha->format('d-m-Y') }}</td>
                <td>{{ $solicitud->descripcion }}</td>               
                <td>{{ $solicitud->solicitante }}</td>
                <td class="{{ $solicitud->tipo == 1 ? 'success' : ($solicitud->tipo == 2 ? 'primary' : 'warning') }}">
                    {{ $solicitud->present()->tipo_solicitud }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-warning" role="alert"><strong>¡Atención!</strong> Aún no se registran solicitudes para éste proyecto.</div>
    @endif
</div>
@stop