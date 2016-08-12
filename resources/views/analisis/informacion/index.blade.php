<h3>Preguntas acerca del proyceto</h3>
<hr>
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Pregunta</th>
        <th>Respuesta</th>
        <th>Opcional</th>
      </tr>
    </thead>
    <tbody>
      @foreach($preguntas as $pregunta)
      <tr>
        <td>{{ $pregunta->pregunta }}</td>
        <td>{{ $pregunta->pivot->respuesta }}</td>
        @if($pregunta->opcional == 1)
        <td class="success">Si</td>
        @else
        <td class="warning">No</td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div