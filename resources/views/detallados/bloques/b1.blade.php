<table  class="display nowrap table table-striped table-bordered" style="width:100%">

    <tr>
        <th style="text-align: center" colspan="4">1. CONDICIÓN DE EQUIPO</th>
      </tr>
      <tr>
        <th style="text-align: center" colspan="2">Inicial</th>
        <th style="text-align: center" colspan="2">Evidencias</th>
      </tr>
      @if(isset($consulta->where('c_titulo_pregunta', 'By pass inicial')->first()->c_titulo_pregunta))

      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'By pass inicial')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'By pass inicial')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia Bypass agua cruda')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia Bypass agua cruda')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Normal Inicial')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Normal Inicial')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia bypass agua filtrada')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia bypass agua filtrada')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Apagado Inicial')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Apagado Inicial')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia bypass agua producto')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia bypass agua producto')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Foto de pizarra')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Foto de pizarra')->first()->evidencia}}" alt=""></td>
      </tr>
      @else
      <tr>
       <td>Sin responder</td>
      </tr>
      @endif

</table>
