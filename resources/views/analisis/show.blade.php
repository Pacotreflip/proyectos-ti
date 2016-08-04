@extends('layout')

@section('content')
<h1>1 Análisis <small>({{ $proyecto->nombre}})</small></h1>
{!! Breadcrumbs::render('proyecto.diseno.show', $proyecto) !!}
<hr>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <a href="#informacion" class="btn btn-default">Información</a>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default">Middle</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default">Right</button>
  </div>
</div>
<section class="first-section" id="informacion">
  <h2>1.1 Información</h2>
  {!! Form::open() !!}
  <div class="form-group">
    {!! Form::label('preguntas', 'Seleccione una pregunta de la lista:', ['class' => 'col-md-3']) !!}
    <div class="col-md-9">
    {!! Form::select('preguntas', $preguntas, null, ['class' => 'form-control', 'placeholder' => '--SELECCIONE UNA PREGUNTA--']) !!}
    </div>
  </div>
  {!! Form::close() !!}
</section>

@stop
@section('scripts')
<script>
    $('select[name=preguntas]').select2({
        width: '100%'
    });
    $('select[name=preguntas]').on('select2:select', function (e) {
        $.ajax({
           url: '{{ route("analisis.cuestionarios.create", $analisis)}}',
           type: 'GET',
           success: function (source) {
               
           }
        });
    });
</script>
@stop