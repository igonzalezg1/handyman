<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
     <link rel="stylesheet" href="{{asset('vendor/bootstrap2/css/bootstrap.min.css')}}">
    <style>

    html {
      margin: 30px;
    }
      
      
      .nav li {
        display: inline-block;
        font-size: 20px;
        padding: 20px;
      }
  

      td img{
        width: 225px; height: 225px;
        text-align: center;
      }
      table{
        padding: 20px;
      }

      </style>
   
</head>
<body>

        <table  class="display  table table-striped table-bordered" style="width:100%">
                        
                          
            <tr>
              <td>SUCURSAL:</td>
              <td>{{$sucursal}}</td>
              <td>Usuario</td>
              <td>{{$usuario}}</td>
            </tr>
            <tr>
              <td>FECHA:</td>
              <td>{{$fecha}}</td>
              <td>HORA:</td>
              <td>{{$hora}}</td>
            </tr>

          
          
      </table>


      


  
<table class="display  table table-striped table-bordered" style="width:100%">
  <tr>
    <td>Bypass agua cruda</td>
    <td>Bypass agua filtrada</td>
    <td>Bypass agua producto</td>
  </tr>
  <tr>
    <td> <img  src="{{$byAguaCruda}}"></td>
    <td> <img  src="{{$bypassAguaFiltrada}}"></td>
    <td> <img  src="{{$bypassAguaProducto}}"></td>
  </tr>
  <tr>
    <td>Foto de pizarra</td>
    <td>Nivel de sal inicial</td>
    <td>Sal final</td>
  </tr>
  <tr>
    <td> <img  src="{{$fotoPizarra}}"></td>
    <td> <img  src="{{$nivelSalInicial}}"></td>
    <td> <img  src="{{$salFinal}}"></td>
  </tr>
  <tr>
    <td>TDS agua cruda</td>
    <td>TDS Agua filtrada</td>
    <td>TDS agua producto</td>
  </tr>
  <tr>
    <td> <img  src="{{$tdsAguaCruda}}"></td>
    <td> <img src="{{$tds}}"></td>
    <td> <img  src="{{$tdsAguaProducto}}"></td>
  </tr>
  <tr>
    <td>Evidencias filtro limpio</td>
    <td>Evidencias antes (filtro sucio)</td>
    <td>Evidencia final</td>
  </tr>
  <tr>
    <td> <img src="{{$filtroLimpio}}"></td>
    <td> <img src="{{$filtroSucio}}"></td>
    <td> <img src="{{$evidenciaFinal}}"></td>
  </tr>
  <tr>
    <td>Foto de pizarra final</td>
    <td>Reporte final con sello de tienda</td>
    <td>Reporte consumibles con sello de tienda</td>
  </tr>
  <tr>
    <td> <img src="{{$pizarraFinal}}"></td>
    <td> <img src="{{$reporteFinalSello}}"></td>
    <td> <img src="{{$consumibleSello}}"></td>
  </tr>
  <tr>
    <td>Evidencia caso urgente</td>
    <td>Evidencia Producción Membrana</td>
    <td>Evidencia modulo contador</td>
  </tr>
  <tr>
    <td> <img src="{{$casoUrgente}}"></td>
    <td><img src="{{$produccionMembrana}}"></td>
    <td><img src="{{$moduloContador}}"></td>
  </tr>
</table>  
   


      

     
  
</body>



</html>