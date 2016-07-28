@extends('layout')

@section('content')
<h2>Nuevo Proyecto TI</h2>
<hr>
{!! Form::open(['route' => 'proyecto.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}   

    <div class="form-group">
      {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-2 control-label']) !!}
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
      {!! Form::label('descripcion', 'Descripción: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('descripcion', '', ['class' => 'form-control', 'size' => '5x3']) !!}       
      </div>
    </div>

    <div class="form-group">
      {!! Form::label('objetivo', 'Objetivo: ', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10">
        {!! Form::textarea('objetivo', '', ['class' => 'form-control', 'size' => '5x2']) !!}       
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
      </div>
    </div>
  {!! Form::close() !!}
@stop