<table  class="  table table-striped table-bordered" style="width:100%">

    <tr>
        <th style="text-align: center" colspan="4">8. CONDICIÓN DE EQUIPO FINAL</th>
      </tr>
      <tr>
        <th style="text-align: center" >PREGUNTA</th>
        <th style="text-align: center" >RESULTADO</th>
      </tr>
      @if(isset($consulta->where('c_titulo_pregunta', 'By Pass final')->first()->c_titulo_pregunta))
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'By Pass final')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'By Pass final')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Normal Final')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Normal Final')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Apagado final')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Apagado final')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia final')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia final')->first()->evidencia}}" alt=""></td>
      </tr>
      @else
      <tr>
       <td>Sin responder</td>
      </tr>
      @endif
</table>
