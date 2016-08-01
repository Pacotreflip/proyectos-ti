@extends('layout')

@section('content')
<h1>Solicitud # {{ $solicitud->id }} <small>({{ $proyecto->nombre }})</small></h1>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
        <div class="panel-heading">
            Detalles de la Solicitud
        </div>
        <div class="panel-body">
            <strong>Fecha Solicitud:</strong> {{ $solicitud->fecha->format('Y-m-d h:m') }} <br>
            <strong>Tipo de Solicitud:</strong> {{ $solicitud->present()->tipo_solicitud }} <br>   
            <strong>Solicitante:</strong> {{ $solicitud->solicitante }}<hr><br>
            <strong>Objetivo del Sistema:</strong> {{ $solicitud->objetivo }} <hr><br>
            <strong>Descripción General del Requerimiento:</strong> {{ $solicitud->descripcion }}
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Documentos o especificaciones técnicas que se anexan como apoyo al requerimiento
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <form action="{{ route('solicitudes.documentos.store', [$solicitud]) }}" class="dropzone" id="dropzone" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
    </form>
</div>
@stop
@section('scripts')
<script>
    Dropzone.options.dropzone = {
        paramName: "documento",
        dictDefaultMessage: "<h2 style='color:#bbb'><span class='fa fa-file-pdf-o' style='padding-right:5px'></span>Arrastre los documentos a ésta zona.</h2>",
        init: function() {
            this.on("errormultiple", function(files, response) {
                console.log(response);
            });
        }
    };
    
    $('#documentos').dropzone({
        url: '{{ route("solicitudes.documentos.create", $solicitud->id) }}'
    });
</script>
@stop