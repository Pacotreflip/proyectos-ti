@extends('layout')

@section('content')
<h2>Programación de Etapas <small>({{ $proyecto->nombre }})</small></h2>
{!! Breadcrumbs::render('proyecto.etapas.edit', $proyecto) !!}
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

@foreach($proyecto->etapas() as $key => $etapa)
<div class="text-center">
    <div class="col-md-1">
      <h4>{{ $key }}</h4>
    </div>
    {!! Form::model($etapa, ['route' => ['proyecto.'.$etapa->getTable().'.update', $proyecto], 'method' => 'PATCH'], ['class' => 'form-horizontal']) !!}
    <div class="col-md-5">
      <div class="form-group {{ is_null($etapa->fecha_inicio) ? 'has-error' : 'has success' }}">
        {!! Form::label('fecha_inicio', 'Fecha Inicio Estimada:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-8">
          {!! Form::date('fecha_inicio', NULL, ['class' => 'form-control success']) !!}
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group {{ is_null($etapa->fecha_inicio) ? 'has-error' : 'has success' }}">
        {!! Form::label('fecha_fin', 'Fecha Fin Estimada:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-8">
          {!! Form::date('fecha_fin', NULL, ['class' => 'form-control']) !!}
        </div>  
      </div>
    </div>   
    <div class="col-md-1">
      {!! Form::submit('Guardar', ['class' => 'btn btn-primary update', 'id' => $etapa->getTable()]) !!}
    </div>
</div>
<br><br><hr>
{!! Form::close() !!}
@endforeach
@stop

@section('scripts')
<script>
    $('.update').off().on('click', function (e) { 
        e.preventDefault();
        
        var etapa = $(this).attr('id');
        var form = $(this).closest('form');
        console.log(etapa);
        $.ajax({
            url: $(form).attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
</script>
@stop