@extends('layout')

@section('content')
<h1>{{ $proyecto->nombre }}</h1>
{!! Breadcrumbs::render('proyectos.show', $proyecto) !!}
<hr>

<div class="row">
  <div class="col-md-4 text-center">
    <a href="{{ route('proyecto.solicitudes.index', $proyecto)}}">
      <i class="fa fa-file fa-lg fa-5x"></i>
      <h2>SOLICITUDES</h2>
    </a>
    <p>Ver las solicitudes asociadas al proyecto.</p>
  </div>
  <div class="col-md-4 text-center">
    <a href="{{ route('proyecto.etapas.index', $proyecto)}}">
      <i class="fa fa-list-ol fa-lg fa-5x"></i>
      <h2>ETAPAS</h2>
    </a>
    <p>Ver las etapas correspondientes al ciclo de vida del proyecto.</p>
  </div>
  <div class="col-md-4 text-center">
    <a href="">
      <i class="fa fa-balance-scale fa-lg fa-5x"></i>
      <h2>INDICADORES</h2>
    </a>
    <p>Ver las indicadores asociadas al proyecto.</p>
  </div>
</div>
@stop