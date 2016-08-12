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

    <div class="errores">
    </div>

@foreach($proyecto->etapas() as $key => $etapa)
<div class="text-center {{$etapa->getTable()}}">
    <div class="col-md-12">
      <h4><a href="{{ route('proyecto.'.$etapa->getTable().'.show', $proyecto)}}">{{ $key }}</a></h4>
    </div>
    {!! Form::model($etapa, ['route' => ['proyecto.'.$etapa->getTable().'.update', $proyecto], 'method' => 'PATCH'], ['class' => 'form-horizontal']) !!}
    <div class="col-md-3">
      <div class="form-group {{ is_null($etapa->fecha_inicio) ? 'has-error' : 'has-success' }}">
        {!! Form::label('fecha_inicio', 'Fecha Inicio Estimada:', ['class' => ' control-label']) !!}
          {!! Form::date('fecha_inicio', $etapa->fecha_inicio, ['class' => 'form-control success']) !!}
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group {{ is_null($etapa->fecha_inicio) ? 'has-error' : 'has-success' }}">
        {!! Form::label('fecha_fin', 'Fecha Fin Estimada:', ['class' => 'control-label']) !!}
        {!! Form::date('fecha_fin', $etapa->fecha_fin, ['class' => 'form-control']) !!}
      </div>
    </div>   
    <div class="col-md-4">
      <div class="form-group {{ $etapa->user ? 'has-success' : 'has-error' }}">
        {!! Form::label('id_usuario', 'Responsable:', ['class' => 'control-label']) !!}
          <select name="id_usuario" id="id_usuario" class="form-control">
            @if($etapa->user)
            <option value="{{$etapa->user->idusuario}}" selected>{{ $etapa->user->present()->nombreCompleto }}</option>
            @endif
          </select>
      </div>
    </div>
    <div class="col-md-1">
      {!! Form::label('') !!}
      {!! Form::submit('Guardar', ['class' => 'btn btn-primary update col-md-offset-12', 'id' => $etapa->getTable()]) !!}
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<hr>
{!! Form::close() !!}
@endforeach
@stop

@section('scripts')
<script>
    $('select[name=id_usuario').select2({
        language: 'es',
        width: '100%',
        ajax: {
            url: '{{ route("api.users.index")}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                    type: 'select2'
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        },
        minimumInputLength: 3
    });
    
    $('.update').off().on('click', function (e) { 
        e.preventDefault();
        
        var etapa = $(this).attr('id');
        var form = $(this).closest('form');
        $.ajax({
            url: $(form).attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (response) {
                swal('',response.success, 'success');
                $('.errores').empty();
                $.each(($('div.'+etapa+' .has-error')), function ( i, element) {
                    $(element).removeClass('has-error').addClass('has-success');
                });              
            },
            error: function(xhr, responseText, thrownError) {
                    var ind1 = xhr.responseText.indexOf('<span class="exception_message">');

                    if(ind1 === -1){
                        var salida = '<div class="alert alert-danger" role="alert"><ul>';
                        $.each($.parseJSON(xhr.responseText), function (ind, elem) { 
                            salida += '<li>'+elem+'</li>';
                        });
                        salida += '</ul></div>';
                        $(".errores").html(salida);
                    }else{
                        var salida = '<div class="alert alert-danger" role="alert"><strong>Errores: </strong> <br> <br><ul >';
                        var ind1 = xhr.responseText.indexOf('<span class="exception_message">');
                        var cad1 = xhr.responseText.substring(ind1);
                        var ind2 = cad1.indexOf('</span>');
                        var cad2 = cad1.substring(32,ind2);
                        if(cad2 !== ""){
                            salida += '<li><p><strong>¡ERROR GRAVE!: </strong></p><p>'+cad2+'</p></li>';
                        }else{
                            salida += '<li>Un error grave ocurrió. Por favor intente otra vez.</li>';
                        }
                        salida += '</ul></div>';
                        $(".errores").html(salida);
                    }
                }
        });
    });
</script>
@stop