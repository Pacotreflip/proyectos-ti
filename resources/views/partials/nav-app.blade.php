<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      {{ $proyecto->nombre }} <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
      <li>{!! link_to_route('proyecto.index', 'Cambiar de proyecto') !!}</li>
  </ul>
</li>
<li>
  <a href="{{ route('proyectos.solicitudes.index', $proyecto->id) }}">Solicitudes</a>
</li>