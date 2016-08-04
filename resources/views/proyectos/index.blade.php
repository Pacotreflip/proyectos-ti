@extends('layout')

@section('content')
<h1>
    Proyectos
    <a href="{{ route('proyectos.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo proyecto</a>
</h1>
{!! Breadcrumbs::render('proyectos.index') !!}
<hr>
<div class="row">
  @foreach($proyectos->chunk(10) as $proyectoset)
  <div class="col-md-6">
    <ul class="list-group">
    @foreach($proyectoset as $key => $p )
      <a href="{{ route('proyectos.show', $p->id) }}" class="list-group-item"><i class="pull-left fa fa-folder"></i><strong> {{ $p->nombre }}<strong> <small>{{ $p->descripcion }}</small></a>
    @endforeach
    </ul>
  </div>
  @endforeach
</div>
<div class="text-center">
    {!! $proyectos->render() !!}
</div>
@stop