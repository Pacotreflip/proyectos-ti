@extends('layout')

@section('content')
<h1>1 Análisis <small>({{ $proyecto->nombre}})</small></h1>
{!! Breadcrumbs::render('proyecto.diseno.show', $proyecto) !!}
<hr>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default selector" id="informacion">Recopilación de Información</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default" id="documentos">Documentación</button>
  </div>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default" id="requerimientos">Requerimientos</button>
  </div>
</div>
<section class="first-section">  
</section>
<section id="content" class="second-section">
  
</section>

@stop
@section('scripts')
<script>
  $('.selector').off().on('click', function (e) {
        var seccion = $(this).attr('id');
        e.preventDefault();
        $(this).focus();
        $.ajax({
        url: App.host + '/analisis/{{$analisis->id}}/' + seccion,
        type: 'GET',
        success: function (source) {
          $('#content').hide(250).html(source).show(250);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        }
      });
  });
</script>
@stop