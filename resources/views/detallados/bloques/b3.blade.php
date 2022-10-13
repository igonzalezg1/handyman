<table  class="  table table-striped table-bordered" style="width:100%">

    <tr>
        <th style="text-align: center" colspan="6">3. ANÁLISIS FÍSICO QUÍMICO DE LA CALIDAD DEL AGUA</th>
      </tr>
      <tr>
        <th style="text-align: center" colspan="2">AGUA CRUDA</th>
        <th style="text-align: center" colspan="2">AGUA FILTRADA</th>
        <th style="text-align: center" colspan="2">AGUA PRODUCTO</th>
      </tr>
      @if(isset($consulta->where('c_titulo_pregunta', 'Cloro libre (PPM) 0.2 - 1.5')->first()->c_titulo_pregunta))

      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro libre (PPM) 0.2 - 1.5')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro libre (PPM) 0.2 - 1.5')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro libre (PPM) 0.2 - 1.5')->last()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro libre (PPM) 0.2 - 1.5')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro libre (PPM) <0.5')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro libre (PPM) <0.5')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro total (PPM) 0.2 -1.5')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro total (PPM) 0.2 -1.5')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro total (PPM) 0.2 -1.5')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro total (PPM) 0.2 -1.5')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro total (PPM) <0.5')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Cloro total (PPM) <0.5')->first()->respuesta}}</td>

      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Dureza (PPM) 500 max')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Dureza (PPM) 500 max')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Dureza (PPM)  500 max')->last()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Dureza (PPM)  500 max')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Dureza (PPM) 17-85')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Dureza (PPM) 17-85')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM) 400max')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM) 400max')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM)  400 max')->last()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM)  400 max')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM) <100')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM) <100')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'PH   6.5 - 8.5')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'PH  6.5 - 8.5')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM)  400 max')->last()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Alcalinidad (PPM)  400 max')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'PH 6.8 - 7.4')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'PH 6.8 - 7.4')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'TDS (PPM) 1000 max')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'TDS (PPM) 1000 max')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'TDS (PPM)  70 - 200')->last()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'TDS (PPM)  70 - 200')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'TDS (PPM)  70 - 200')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'TDS (PPM)  70 - 200')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia TDS agua cruda')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia TDS agua cruda')->first()->evidencia}}" alt=""></td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia TDS')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia TDS')->first()->evidencia}}" alt=""></td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia TDS agua producto')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia TDS agua producto')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Presion de operacion  45 - 60 (PSI)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Presion de operacion  45 - 60 (PSI)')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Presion de operacion (PSI)  45 - 60')->last()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Presion de operacion (PSI)  45 - 60')->last()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Presion de operacion (PSI)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Presion de operacion (PSI)')->first()->respuesta}}</td>
      </tr>
      <tr>
         <td>{{$consulta->where('c_titulo_pregunta', 'Produccion de membranas  >750ml/min')->first()->c_titulo_pregunta}}</td>
         <td>{{$consulta->where('c_titulo_pregunta', 'Produccion de membranas  >750ml/min')->first()->respuesta}}</td>
         <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia Produccion membrana ')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia Produccion membrana ')->first()->evidencia}}" alt=""></td>

      </tr>
      <tr>
        <td style="text-align: center;" colspan="6"><strong>LAMPRA UV</strong></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Lampara UV dias de vida util. Minimo 30')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Lampara UV dias de vida util. Minimo 30')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia modulo contador')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia modulo contador')->first()->evidencia}}" alt=""></td>

      </tr>
      @else
      <tr>
       <td>Sin responder</td>
      </tr>
      @endif
</table>
