@extends('layout')

@section('content')
<h1>
    Proyectos
    <a href="{{ route('proyecto.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo proyecto</a>
</h1>
<hr>
<div class="row">
  <div class="col-md-6">
    <ul class="list-group">
    @foreach($proyectos as $key => $p )
    @if(($key + 1) % 10 == 0 && $key != 0)
      <a href="{{ route('proyecto.show', $p->id) }}" class="list-group-item"><i class="pull-left fa fa-folder"></i><strong> {{ $p->nombre }}<strong> <small>{{ $p->descripcion }}</small></a>
    </ul>
  </div>
  <div class="col-md-6">
    <ul class="list-group">
    @else
      <a href="{{ route('proyecto.show', $p->id) }}" class="list-group-item"><i class="pull-left fa fa-folder"></i><strong> {{ $p->nombre }}<strong> <small>{{ $p->descripcion }}</small></a>
    @endif
    @endforeach
  </div>
</div>
<div class="text-center">
  {!! $proyectos->render() !!}
</div>
@stop