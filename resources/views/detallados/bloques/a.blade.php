<table  class="  table table-striped table-bordered" style="width:100%">

    <tr>
        <th style="text-align: center" colspan="4">ACCIONES</th>
      </tr>
      <tr>
        <th style="text-align: center" >PREGUNTA</th>
        <th style="text-align: center" >RESULTADO</th>
      </tr>
      @if(isset($consulta->where('c_titulo_pregunta', 'Se realizo accion de mantenimiento preventivo?')->first()->c_titulo_pregunta))

      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Se realizo accion de mantenimiento preventivo?')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Se realizo accion de mantenimiento preventivo?')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Se realizo cambio de filtros?')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Se realizo cambio de filtros?')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Recarga de sal?')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Recarga de sal?')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Foto de pizarra final')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Foto de pizarra final')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Foto de reporte final con sello de tienda')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Foto de reporte final con sello de tienda')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Foto reporte consumibles con sello de tienda')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Foto reporte consumibles con sello de tienda')->first()->evidencia}}" alt=""></td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Comentarios en caso de urgencia')->first()->c_titulo_pregunta}}</td>
        <td>{{$consulta->where('c_titulo_pregunta', 'Comentarios en caso de urgencia')->first()->respuesta}}</td>
      </tr>
      <tr>
        <td>{{$consulta->where('c_titulo_pregunta', 'Foto evidencia caso urgente')->first()->c_titulo_pregunta}}</td>
        <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$consulta->where('c_titulo_pregunta', 'Foto evidencia caso urgente')->first()->evidencia}}" alt=""></td>
      </tr>
      @else
      <tr>
       <td>Sin responder</td>
      </tr>
      @endif
</table>
