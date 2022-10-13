<table  class="  table table-striped table-bordered" style="width:100%">

    <tr>
        <th style="text-align: center" colspan="6">5. PROGRAMACIÓN DE CAMBIO DE FILTROS (TIPO)</th>
      </tr>
      <tr>
        <th style="text-align: center" colspan="2">SEDIMENTOS</th>
        <th style="text-align: center" colspan="2">CARBÓN ACTIVADO</th>
        <th style="text-align: center" colspan="2">PREFILTRO</th>
      </tr>
      @if(isset($consulta->where('c_titulo_pregunta', 'Tipo de sedimientos')->first()->c_titulo_pregunta))

      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de sedimientos')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de sedimientos')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de filtro carbon')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de filtro carbon')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo Prefiltro')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo Prefiltro')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia de prefiltro')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia de prefiltro')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de sedimiento filtro 2 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de sedimiento filtro 2 (si aplica)')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro carbon 2 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro carbon 2 (si aplica)')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencias filtro limpio')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencias filtro limpio')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro 2 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro 2 (si aplica)')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro carbon 2 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro carbon 2 (si aplica)')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencias antes (filtro sucio)')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencias antes (filtro sucio)')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de sedimiento filtro 3 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo de sedimiento filtro 3 (si aplica)')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo filtro carbon 3 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Tipo filtro carbon 3 (si aplica)')->first()->respuesta}}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro 3 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro 3 (si aplica)')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro carbon 3 (si aplica)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Frecuencia filtro carbon 3 (si aplica)')->first()->respuesta}}</td>
        <td></td>
        <td></td>
      </tr>
      @else
      <tr>
       <td>Sin responder</td>
      </tr>
      @endif
</table>
