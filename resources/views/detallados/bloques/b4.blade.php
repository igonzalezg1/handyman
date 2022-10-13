<table  class="  table table-striped table-bordered" style="width:100%">

    <tr>
        <th style="text-align: center" colspan="3">4. REVISIÓN BOMBEO</th>
      </tr>
      <tr>
        <th style="text-align: center" >BOMBA</th>
        <th style="text-align: center" >¿FUNCIONA?</th>
        <th style="text-align: center" >EVIDENCIA</th>
      </tr>
      @if(isset($consulta->where('c_titulo_pregunta', 'Funciona bomba')->first()->c_titulo_pregunta))
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona bomba')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona bomba')->first()->respuesta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Funciona bomba')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona switch de presion')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona switch de presion')->first()->respuesta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Funciona switch de presion')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona manometros')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona manometros')->first()->respuesta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Funciona manometros')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona tranque precargado')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona tranque precargado')->first()->respuesta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Funciona tranque precargado')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona proteccion de bomba')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Funciona proteccion de bomba')->first()->respuesta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Funciona proteccion de bomba')->first()->evidencia}}" alt=""></td>
      </tr>
      @else
      <tr>
       <td>Sin responder</td>
      </tr>
      @endif
</table>
