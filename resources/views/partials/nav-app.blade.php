<li>
  <a href="{{ route('proyecto.solicitudes.index', $proyecto) }}">Solicitudes</a>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Etapas<span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
      <li><a href="{{ route('proyecto.analisis.show', $proyecto) }}">Análisis</li>
      <li><a href="{{ route('proyecto.diseno.show', $proyecto) }}">Diseño</li>
  </ul>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catálogos<span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
      <li><a href="{{ route('users.index') }}">Preguntas</li>
      <li><a href="{{ route('preguntas.index') }}">Usuarios</li>
  </ul>
</li>