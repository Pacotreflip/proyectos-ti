@extends('layout')

@section('content')
<h2>Nuevo Proyecto TI</h2>
{!! Breadcrumbs::render('proyectos.create') !!}
<hr>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['route' => 'proyectos.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}   
    
    
    <h3>Información del Proyecto</h3>

    <div class="form-group">
      {!! Form::label('nombre', 'Nombre del Proyecto: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::text('nombre', '', ['class' => 'form-control']) !!}       
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('fecha_inicio', 'Fecha de Inicio: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4">
        {!! Form::date('fecha_inicio', '', ['class' => 'form-control']) !!}       
      </div>
      {!! Form::label('fecha_fin', 'Fecha de Fin: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4">
        {!! Form::date('fecha_fin', '', ['class' => 'form-control']) !!}       
      </div>
    </div>
    
    <div class="form-group">
      {!! Form::label('descripcion', 'Descripción General del Requerimiento: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('descripcion', '', ['class' => 'form-control', 'size' => '5x3']) !!}       
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('objetivo', 'Objetivo del Sistema: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('objetivo', '', ['class' => 'form-control', 'size' => '5x2']) !!}       
      </div>
    </div>
    <hr>
    
    <h3>Información de la Solicitud</h3>
    <div class="form-group">
        {!! Form::label('solicitante', 'Nombre del Solicitante', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('solicitante', '', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
      {!! Form::label('fecha_solicitud', 'Fecha de Solicitud: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4">
        {!! Form::date('fecha_solicitud', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}       
      </div>
      {!! Form::label('tipo_solicitud', 'Tipo de Solicitud: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4">
        {!! Form::text('tipo_solicitud', 'NUEVO SISTEMA', ['class' => 'form-control', 'disabled']) !!}       
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
      </div>
    </div>
    
    
  {!! Form::close() !!}
@stop
@section('scripts')
<script>
    $(function() {
        swal({
            type: 'info',
            text: 'Al crear un proyecto automaticamente se creará la solicitud para el nuevo sistema',
            title: ''
        });
    });
    
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