@extends('layout')

@section('content')
<h1>Nueva Solicitud <small>({{ $proyecto->nombre }})</small></h1>
<hr>
{!! Form::open(['route' => ['proyectos.solicitudes.store', $proyecto->id], 'method' => 'POST', 'class' => 'form-horizontal']) !!}   
    <div class="form-group">
        {!! Form::label('fecha', 'Fecha de Solicitud', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::date('fecha', \Carbon\Carbon::now(), ['class' => 'form-control'])  !!}
        </div>
        {!! Form::label('tipo', 'Tipo de Solicitud', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('tipo', \App\Models\Solicitud::tipos(), null, ['class' => 'form-control', 'placeholder' => '-- SELECCIONE EL TIPO--']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('solicitante', 'Nombre del Solicitante', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('solicitante', '', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('objetivo', 'Objetivo del Sistema:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-md-4 col-sm-10">
            {!! Form::textarea('objetivo', '', ['class' => 'form-control', 'size' => '30x5']) !!}
        </div>
        {!! Form::label('descripcion', 'Descripción General del Requerimiento:', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-md-4 col-sm-10">
            {!! Form::textarea('descripcion', '', ['class' => 'form-control', 'size' => '30x5']) !!}
        </div>
    </div>

    <div class="form-group">
        
    </div>
    
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
        <a id="cancelar" href="{{ route('proyectos.solicitudes.index', $proyecto->id) }}" class="btn btn-danger">Cancelar</a>
      </div>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
<script>
    $('input[name=solicitante]').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: App.host + '/api/users',
                dataType: 'jsonp',
                data: {
                    q: request.term
                },
                success: function(data) {
                    response( data );
                }
            });
        }
    });
</script>
@stop