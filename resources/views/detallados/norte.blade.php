@extends('adminlte::page')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)    


@section('title', 'Reportes generales')

@section('content_header')
  
@stop

@section('content')
<div class="container">
    <div class="row botonera">
        <div class="col-md-4">
          
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <!-- Default box -->
        <div class="card " >
            <div class="container=fluid p-3">
                <div class="card-body" id="f315-div" >
                    <table   style="width:100%">
                        
                          
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
                          <tr>
                            <td>Reporte detallado</td>
                            <td> <a href="{{ route('descargarnReporte', $idrespuesta)}}" class="btn btn-primary">Descargar PDF</a></td>
                            <td>Reporte fotográfico</td>
                            <td> <a href="{{ route('descargarnfReporte', $idrespuesta)}}" class="btn btn-primary">Descargar PDF</a></td>
                          </tr>
                          
                  
                    </table>
                </div>
            </div>
  
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
   
</div>


<div class="container-fluid spark-screen">
  <div class="row">
      <div class="col-md-12">

          <!-- Default box -->
          <div class="card " >
              <div class="container=fluid p-3">
                  <div class="card-body" id="f315-div" >
                      <table  class="display nowrap table table-striped table-bordered" style="width:100%">
                          
                          <tr>
                              <th style="text-align: center" colspan="4">1. CONDICIÓN DE EQUIPO</th>
                            </tr>
                            <tr>
                              <th style="text-align: center" colspan="2">Inicial</th>
                              <th style="text-align: center" colspan="2">Evidencias</th>
                            </tr>
                            @if(isset($b1[0]->c_titulo_pregunta))
                            <tr>
                              <td>{{$b1[0]->c_titulo_pregunta}}</td>
                              <td>{{$b1[0]->respuesta}}</td>
                              <td>{{$b1[3]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b1[3]->evidencia}}" alt=""></td>
                            </tr>
                            <tr>
                              <td>{{$b1[1]->c_titulo_pregunta}}</td>
                              <td>{{$b1[1]->respuesta}}</td>
                              <td>{{$b1[4]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b1[4]->evidencia}}" alt=""></td>
                            </tr>
                            <tr>
                              <td>{{$b1[2]->c_titulo_pregunta}}</td>
                              <td>{{$b1[2]->respuesta}}</td>
                              <td>{{$b1[5]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b1[5]->evidencia}}" alt=""></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td>{{$b1[6]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b1[6]->evidencia}}" alt=""></td>
                            </tr>
                            @else 
                            <tr>
                             <td>Sin responder</td>
                            </tr>
                            @endif
                      </table>
                  </div>
              </div>
    
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

      </div>
     
  </div>
  <div class="row">
      <div class="col-md-12 ">

          <!-- Default box -->
          <div class="card " >
              <div class="container=fluid p-3">
                  <div class="card-body" id="f315-div" >
                    <table  class="display nowrap table table-striped table-bordered" style="width:100%">
                          
                      <tr>
                          <th style="text-align: center" colspan="4">2. SAL PELLET Y MEDIOS FILTRANTES</th>
                        </tr>
                        <tr>
                          <th style="text-align: center" colspan="2">Consumible</th>
                          <th style="text-align: center" colspan="2">Evidencias</th>
                        </tr>
                        @if(isset($b2[0]->c_titulo_pregunta))
                        <tr>
                          <td>{{$b2[0]->c_titulo_pregunta}}</td>
                          <td>{{$b2[0]->respuesta}}</td>
                          <td></td>
                          <td>{{$b2[0]->evidencia}}</td>
                        </tr>
                        <tr>
                          <td>{{$b2[1]->c_titulo_pregunta}}</td>
                          <td>{{$b2[1]->respuesta}}</td>
                          <td></td>
                          <td>{{$b2[1]->evidencia}}</td>
                        </tr>
                        <tr>
                          <td>{{$b2[2]->c_titulo_pregunta}}</td>
                          <td>{{$b2[2]->respuesta}}</td>
                          <td></td>
                          <td>{{$b2[2]->evidencia}}</td>
                        </tr>
                        <tr>
                          <td>{{$b2[3]->c_titulo_pregunta}}</td>
                          <td>{{$b2[3]->respuesta}}</td>
                          <td>{{$b2[4]->c_titulo_pregunta}}</td>
                          <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b2[4]->evidencia}}" alt=""></td>
                        </tr>
                        <tr>
                          <td>{{$b2[5]->c_titulo_pregunta}}</td>
                          <td>{{$b2[5]->respuesta}}</td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>{{$b2[6]->c_titulo_pregunta}}</td>
                          <td>{{$b2[6]->respuesta}}</td>
                          <td>{{$b2[7]->c_titulo_pregunta}}</td>
                          <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b2[7]->evidencia}}" alt=""></td>
                        </tr>
                        <tr>
                          <td>{{$b2[8]->c_titulo_pregunta}}</td>
                          <td>{{$b2[8]->respuesta}}</td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>{{$b2[9]->c_titulo_pregunta}}</td>
                          <td>{{$b2[9]->respuesta}}</td>
                          <td></td>
                          <td></td>
                        </tr>
                    
                        @else 
                        <tr>
                         <td>Sin responder</td>
                        </tr>
                        @endif
                  </table>
                  </div>
              </div>
    
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

      </div>
  </div>
  <div class="row">
      <div class="col-md-12 ">

          <!-- Default box -->
          <div class="card " >
              <div class="container=fluid p-3">
                  <div class="card-body" id="f315-div" >
                      <table  class="  table table-striped table-bordered" style="width:100%">
                          
                          <tr>
                              <th style="text-align: center" colspan="6">3. ANÁLISIS FÍSICO QUÍMICO DE LA CALIDAD DEL AGUA</th>
                            </tr>
                            <tr>
                              <th style="text-align: center" colspan="2">AGUA CRUDA</th>
                              <th style="text-align: center" colspan="2">AGUA FILTRADA</th>
                              <th style="text-align: center" colspan="2">AGUA PRODUCTO</th>
                            </tr>
                            @if(isset($b3[0]->c_titulo_pregunta))
                            <tr>
                              <td>{{$b3[0]->c_titulo_pregunta}}</td>
                              <td>{{$b3[0]->respuesta}}</td>
                              <td>{{$b3[8]->c_titulo_pregunta}}</td>
                              <td>{{$b3[8]->respuesta}}</td>
                              <td>{{$b3[16]->c_titulo_pregunta}}</td>
                              <td>{{$b3[16]->respuesta}}</td>
                            </tr>
                            <tr>
                              <td>{{$b3[1]->c_titulo_pregunta}}</td>
                              <td>{{$b3[1]->respuesta}}</td>
                              <td>{{$b3[9]->c_titulo_pregunta}}</td>
                              <td>{{$b3[9]->respuesta}}</td>
                              <td>{{$b3[17]->c_titulo_pregunta}}</td>
                              <td>{{$b3[17]->respuesta}}</td>
                           
                            </tr>
                            <tr>
                              <td>{{$b3[2]->c_titulo_pregunta}}</td>
                              <td>{{$b3[2]->respuesta}}</td>
                              <td>{{$b3[10]->c_titulo_pregunta}}</td>
                              <td>{{$b3[10]->respuesta}}</td>
                              <td>{{$b3[18]->c_titulo_pregunta}}</td>
                              <td>{{$b3[18]->respuesta}}</td>
                            </tr>
                            <tr>
                              <td>{{$b3[3]->c_titulo_pregunta}}</td>
                              <td>{{$b3[3]->respuesta}}</td>
                              <td>{{$b3[11]->c_titulo_pregunta}}</td>
                              <td>{{$b3[11]->respuesta}}</td>
                              <td>{{$b3[19]->c_titulo_pregunta}}</td>
                              <td>{{$b3[19]->respuesta}}</td>
                            </tr>
                            <tr>
                              <td>{{$b3[4]->c_titulo_pregunta}}</td>
                              <td>{{$b3[4]->respuesta}}</td>
                              <td>{{$b3[12]->c_titulo_pregunta}}</td>
                              <td>{{$b3[12]->respuesta}}</td>
                              <td>{{$b3[20]->c_titulo_pregunta}}</td>
                              <td>{{$b3[20]->respuesta}}</td>
                            </tr>
                            <tr>
                              <td>{{$b3[5]->c_titulo_pregunta}}</td>
                              <td>{{$b3[5]->respuesta}}</td>
                              <td>{{$b3[13]->c_titulo_pregunta}}</td>
                              <td>{{$b3[13]->respuesta}}</td>
                              <td>{{$b3[21]->c_titulo_pregunta}}</td>
                              <td>{{$b3[21]->respuesta}}</td>
                            </tr>
                            <tr>
                              <td>{{$b3[6]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b3[6]->evidencia}}" alt=""></td>
                              <td>{{$b3[14]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b3[14]->evidencia}}" alt=""></td>
                              <td>{{$b3[22]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b3[22]->evidencia}}" alt=""></td>
                            </tr>
                            <tr>
                              <td>{{$b3[7]->c_titulo_pregunta}}</td>
                              <td>{{$b3[7]->respuesta}}</td>
                              <td>{{$b3[15]->c_titulo_pregunta}}</td>
                              <td>{{$b3[15]->respuesta}}</td>
                              <td>{{$b3[23]->c_titulo_pregunta}}</td>
                              <td>{{$b3[23]->respuesta}}</td>
                            </tr>
                            <tr>
                               <td>{{$b3[24]->c_titulo_pregunta}}</td>
                               <td>{{$b3[24]->respuesta}}</td>
                               <td>{{$b3[25]->c_titulo_pregunta}}</td>
                               <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b3[25]->evidencia}}" alt=""></td>
                              
                            </tr>
                            <tr>
                              <td style="text-align: center;" colspan="6"><strong>LAMPRA UV</strong></td>
                            </tr>
                            <tr>
                              <td>{{$b3[26]->c_titulo_pregunta}}</td>
                              <td>{{$b3[26]->respuesta}}</td>
                              <td>{{$b3[27]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b3[27]->evidencia}}" alt=""></td>
                             
                            </tr>
                            @else 
                            <tr>
                             <td>Sin responder</td>
                            </tr>
                            @endif
                      </table>
                  </div>
              </div>
    
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

      </div>
  </div>
  <div class="row">
      <div class="col-md-12 ">

          <!-- Default box -->
          <div class="card " >
              <div class="container=fluid p-3">
                  <div class="card-body" id="f315-div" >
                      <table  class="  table table-striped table-bordered" style="width:100%">
                          
                          <tr>
                              <th style="text-align: center" colspan="3">4. REVISIÓN BOMBEO</th>
                            </tr>
                            <tr>
                              <th style="text-align: center" >BOMBA</th>
                              <th style="text-align: center" >¿FUNCIONA?</th>
                              <th style="text-align: center" >EVIDENCIA</th>
                            </tr>
                            @if(isset($b4[0]->c_titulo_pregunta))
                            <tr>
                              <td>{{$b4[0]->c_titulo_pregunta}}</td>
                              <td>{{$b4[0]->respuesta}}</td>
                              <td>{{$b4[0]->evidencia}}</td>
                            </tr>
                            <tr>
                              <td>{{$b4[1]->c_titulo_pregunta}}</td>
                              <td>{{$b4[1]->respuesta}}</td>
                              <td>{{$b4[1]->evidencia}}</td>
                           
                            </tr>
                            <tr>
                              <td>{{$b4[2]->c_titulo_pregunta}}</td>
                              <td>{{$b4[2]->respuesta}}</td>
                              <td>{{$b4[2]->evidencia}}</td>
                            </tr>
                            <tr>
                              <td>{{$b4[3]->c_titulo_pregunta}}</td>
                              <td>{{$b4[3]->respuesta}}</td>
                              <td>{{$b4[3]->evidencia}}</td>
                            </tr>
                            <tr>
                              <td>{{$b4[4]->c_titulo_pregunta}}</td>
                              <td>{{$b4[4]->respuesta}}</td>
                              <td>{{$b4[4]->evidencia}}</td>
                            </tr>
                            @else 
                            <tr>
                             <td>Sin responder</td>
                            </tr>
                            @endif
                      </table>
                  </div>
              </div>
    
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

      </div>
  </div>
  <div class="row">
      <div class="col-md-12 ">

          <!-- Default box -->
          <div class="card " >
              <div class="container=fluid p-3">
                  <div class="card-body" id="f315-div" >
                      <table  class="  table table-striped table-bordered" style="width:100%">
                          
                          <tr>
                              <th style="text-align: center" colspan="6">5. PROGRAMACIÓN DE CAMBIO DE FILTROS (TIPO)</th>
                            </tr>
                            <tr>
                              <th style="text-align: center" colspan="2">SEDIMENTOS</th>
                              <th style="text-align: center" colspan="2">CARBÓN ACTIVADO</th>
                              <th style="text-align: center" colspan="2">PREFILTRO</th>
                            </tr>
                            @if(isset($b5[0]->c_titulo_pregunta))
                            <tr>
                              <td>{{$b5[0]->c_titulo_pregunta}}</td>
                              <td>{{$b5[0]->respuesta}}</td>
                              <td>{{$b5[6]->c_titulo_pregunta}}</td>
                              <td>{{$b5[6]->respuesta}}</td>
                              <td>{{$b5[12]->c_titulo_pregunta}}</td>
                              <td>{{$b5[12]->respuesta}}</td>
                            </tr>
                            <tr>
                              <td>{{$b5[1]->c_titulo_pregunta}}</td>
                              <td>{{$b5[1]->respuesta}}</td>
                              <td>{{$b5[7]->c_titulo_pregunta}}</td>
                              <td>{{$b5[7]->respuesta}}</td>
                              <td>{{$b5[13]->c_titulo_pregunta}}</td>
                              <td>{{$b5[13]->respuesta}}</td>
                            </tr>
                            <tr>
                              <td>{{$b5[2]->c_titulo_pregunta}}</td>
                              <td>{{$b5[2]->respuesta}}</td>
                              <td>{{$b5[8]->c_titulo_pregunta}}</td>
                              <td>{{$b5[8]->respuesta}}</td>
                              <td>{{$b5[14]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b5[14]->evidencia}}" alt=""></td>
                            </tr>
                            <tr>
                              <td>{{$b5[3]->c_titulo_pregunta}}</td>
                              <td>{{$b5[3]->respuesta}}</td>
                              <td>{{$b5[9]->c_titulo_pregunta}}</td>
                              <td>{{$b5[9]->respuesta}}</td>
                              <td>{{$b5[15]->c_titulo_pregunta}}</td>
                              <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b5[15]->evidencia}}" alt=""></td>
                            </tr>
                            <tr>
                              <td>{{$b5[4]->c_titulo_pregunta}}</td>
                              <td>{{$b5[4]->respuesta}}</td>
                              <td>{{$b5[10]->c_titulo_pregunta}}</td>
                              <td>{{$b5[10]->respuesta}}</td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>{{$b5[5]->c_titulo_pregunta}}</td>
                              <td>{{$b5[5]->respuesta}}</td>
                              <td>{{$b5[11]->c_titulo_pregunta}}</td>
                              <td>{{$b5[11]->respuesta}}</td>
                              <td></td>
                              <td></td>
                            </tr>
                            @else 
                            <tr>
                             <td>Sin responder</td>
                            </tr>
                            @endif
                      </table>
                  </div>
              </div>
    
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

      </div>
  </div>


  <div class="row">
    <div class="col-md-12 ">

        <!-- Default box -->
        <div class="card " >
            <div class="container=fluid p-3">
                <div class="card-body" id="f315-div" >
                    <table  class="  table table-striped table-bordered" style="width:100%">
                        
                        <tr>
                            <th style="text-align: center" colspan="4">8. CONDICIÓN DE EQUIPO FINAL</th>
                          </tr>
                          <tr>
                            <th style="text-align: center" >PREGUNTA</th>
                            <th style="text-align: center" >RESULTADO</th>
                          </tr>
                          @if(isset($b8[0]->c_titulo_pregunta))
                          <tr>
                            <td>{{$b8[0]->c_titulo_pregunta}}</td>
                            <td>{{$b8[0]->respuesta}}</td>
                          </tr>
                          <tr>
                            <td>{{$b8[1]->c_titulo_pregunta}}</td>
                            <td>{{$b8[1]->respuesta}}</td>
                          </tr>
                          <tr>
                            <td>{{$b8[2]->c_titulo_pregunta}}</td>
                            <td>{{$b8[2]->respuesta}}</td>
                          </tr>
                          <tr>
                            <td>{{$b8[3]->c_titulo_pregunta}}</td>
                            <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$b8[3]->evidencia}}" alt=""></td>
                          </tr>
                          @else 
                          <tr>
                           <td>Sin responder</td>
                          </tr>
                          @endif
                    </table>
                </div>
            </div>
  
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
</div>
<div class="row">
  <div class="col-md-12 ">

      <!-- Default box -->
      <div class="card " >
          <div class="container=fluid p-3">
              <div class="card-body" id="f315-div" >
                  <table  class="  table table-striped table-bordered" style="width:100%">
                      
                      <tr>
                          <th style="text-align: center" colspan="4">ACCIONES</th>
                        </tr>
                        <tr>
                          <th style="text-align: center" >PREGUNTA</th>
                          <th style="text-align: center" >RESULTADO</th>
                        </tr>
                        @if(isset($a[0]->c_titulo_pregunta))
                            
                        <tr>
                          <td>{{$a[0]->c_titulo_pregunta}}</td>
                          <td>{{$a[0]->respuesta}}</td> 
                        </tr>
                        <tr>
                          <td>{{$a[1]->c_titulo_pregunta}}</td>
                          <td>{{$a[1]->respuesta}}</td>
                        </tr>
                        <tr>
                          <td>{{$a[2]->c_titulo_pregunta}}</td>
                          <td>{{$a[2]->respuesta}}</td>
                        </tr>
                        <tr>
                          <td>{{$a[3]->c_titulo_pregunta}}</td>
                          <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$a[3]->evidencia}}" alt=""></td>
                        </tr>
                        <tr>
                          <td>{{$a[4]->c_titulo_pregunta}}</td>
                          <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$a[4]->evidencia}}" alt=""></td>
                        </tr>
                        <tr>
                          <td>{{$a[5]->c_titulo_pregunta}}</td>
                          <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$a[5]->evidencia}}" alt=""></td>
                        </tr>
                        <tr>
                          <td>{{$a[6]->c_titulo_pregunta}}</td>
                          <td>{{$a[6]->respuesta}}</td>
                        </tr>
                        <tr>
                          <td>{{$a[7]->c_titulo_pregunta}}</td>
                          <td><img src="https://fotos.sumapp.cloud/Sumapp/Multiserle/{{$a[7]->evidencia}}" alt=""></td>
                        </tr>
                        @else 
                        <tr>
                         <td>Sin responder</td>
                        </tr>
                        @endif
                  </table>
              </div>
          </div>

          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </div>
</div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

   <style>
    button{
        margin-left: 20px;
    }
    .botonera{
        margin-bottom: 10px;
        margin-left: 15px;
}
img{
  width: 80px;
}
    </style>


@stop

@section('js')


<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable({
        pageLength : 50,
        "bDestroy": true,
        orderCellsTop: true,
        "order": [[ 0, "desc" ]],
        autoWidth: false,
        "scrollX": true,
        "scrollY":"400px",
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel',
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros ",
            "zeroRecords": "No se encontraron datos",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtrado de  _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
              "next": "Siguiente",
              "previous": "Anterior"
            }
        },
    });
} );
</script>
<script>
    $('#example tr').click(function() {
       var href = $(this).find("a").attr("href");
       if(href) {
           window.open(href,
           '_blank');
       }
   });

</script>
<script type="text/javascript">
    $(function() {
    
        var start = moment().subtract(29, 'days');
        var end = moment();
    
        function cb(start, end) {
            $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        }
    
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Último mes ': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
        "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Guardar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Setiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
        }, cb);
    
        cb(start, end);
    
    });
    </script>
@stop