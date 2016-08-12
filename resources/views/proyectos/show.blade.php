@extends('layout')

@section('content')
<h1>{{ $proyecto->nombre }}</h1>
{!! Breadcrumbs::render('proyectos.show', $proyecto) !!}
<hr>
@stop