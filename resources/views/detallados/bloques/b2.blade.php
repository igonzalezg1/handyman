<table  class="display nowrap table table-striped table-bordered" style="width:100%">

    <tr>
        <th style="text-align: center" colspan="4">2. SAL PELLET Y MEDIOS FILTRANTES</th>
      </tr>
      <tr>
        <th style="text-align: center" colspan="2">Consumible</th>
        <th style="text-align: center" colspan="2">Evidencias</th>
      </tr>
      @if(isset($consulta->where('c_titulo_pregunta', 'Multimedia AG (o turbiedad)')->first()->c_titulo_pregunta))

      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Multimedia AG (o turbiedad)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Multimedia AG (o turbiedad)')->first()->respuesta}}</td>
        <td></td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Multimedia AG (o turbiedad)')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Carbon Activado (o cloro)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Carbon Activado (o cloro)')->first()->respuesta}}</td>
        <td></td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Carbon Activado (o cloro)')->first()->evidencia}}" alt=""></td>
      </tr>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Resina (o 100 PPM dureza)')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Resina (o 100 PPM dureza)')->first()->respuesta}}</td>
        <td></td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Resina (o 100 PPM dureza)')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Nivel de sal inicial')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Nivel de sal inicial')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Evidencia nivel de sal inicial')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia nivel de sal inicial')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Recargas de bultos de sal')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Recargas de bultos de sal')->first()->respuesta}}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Nivel de sal final')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Nivel de sal final')->first()->respuesta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'like','Evidencia Sal Final')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Evidencia Sal Final')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Retrolavado suavizador')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Retrolavado suavizador')->first()->respuesta}}</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Retrolavado carbon')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Retrolavado carbon')->first()->respuesta}}</td>
        <td></td>
        <td></td>
      </tr>
      @else
      <tr>
       <td>Sin responder</td>
      </tr>
      @endif

</table>
