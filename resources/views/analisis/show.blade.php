@extends('layout')

@section('content')
<h1>1 Análisis <small>({{ $proyecto->nombre}})</small></h1>
{!! Breadcrumbs::render('proyecto.diseno.show', $proyecto) !!}
<hr>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default" id="informacion">Información</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default" id="documentacion">Documentación</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default" id="requerimientos">Requerimientos</button>
  </div>
</div>
<section id="content" class="second-section">
</section>

@stop
@section('scripts')
<script>
  $('#informacion').off().on('click', function (e) {
      $.ajax({
        url: '{{ route("analisis.informacion.show", $analisis)}}',
        type: 'GET',
        success: function (source) {
          $('#content').html(source);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        }
      });
  }
</script>
@stop