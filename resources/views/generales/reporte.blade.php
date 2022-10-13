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
                    <table  class="display nowrap table table-striped table-bordered" style="width:100%">
                        
                          
                          <tr>
                            <td>SUCURSAL:</td>
                            <td></td>
                            <td>NO. TIENDA</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>FECHA:</td>
                            <td></td>
                            <td>HORA:</td>
                            <td></td>
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
                              
                              <tr>
                                <td>{{$b1p2[0]->c_titulo_pregunta}}</td>
                                <td>{{$b1p2[0]->respuesta}}</td>
                                <td>{{$b1p5[0]->c_titulo_pregunta}}</td>
                                <td>{{$b1p5[0]->evidencia}}</td>
                              </tr>
                              <tr>
                                <td>{{$b1p3[0]->c_titulo_pregunta}}</td>
                                <td>{{$b1p3[0]->respuesta}}</td>
                                <td>{{$b1p6[0]->c_titulo_pregunta}}</td>
                                <td>{{$b1p6[0]->evidencia}}</td>
                              </tr>
                              <tr>
                                <td>{{$b1p4[0]->c_titulo_pregunta}}</td>
                                <td>{{$b1p4[0]->respuesta}}</td>
                                <td>{{$b1p7[0]->c_titulo_pregunta}}</td>
                                <td>{{$b1p7[0]->evidencia}}</td>
                              </tr>
                      
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
                                <th style="text-align: center" colspan="4">2. SAL PELLET Y MEDIOS FILTRANTES</th>
                              </tr>
                              <tr>
                                <th style="text-align: center" >CONSUMIBLES</th>
                                <th style="text-align: center" >RESULTADO</th>
                              </tr>
                              
                              <tr>
                                <td>pregunta</td>
                                <td>respuesta</td>
                               
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                              
                             
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                             
                              </tr>
                      
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
                                <th style="text-align: center" colspan="4">3. ANÁLISIS FÍSICO QUÍMICO DE LA CALIDAD DEL AGUA</th>
                              </tr>
                              <tr>
                                <th style="text-align: center" >CONSUMIBLES</th>
                                <th style="text-align: center" >RESULTADO</th>
                              </tr>
                              
                              <tr>
                                <td>pregunta</td>
                                <td>respuesta</td>
                               
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                              
                             
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                             
                              </tr>
                      
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
                                <th style="text-align: center" colspan="4">4. REVISIÓN BOMBEO</th>
                              </tr>
                              <tr>
                                <th style="text-align: center" >CONSUMIBLES</th>
                                <th style="text-align: center" >RESULTADO</th>
                              </tr>
                              
                              <tr>
                                <td>pregunta</td>
                                <td>respuesta</td>
                               
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                              
                             
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                             
                              </tr>
                      
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
                                <th style="text-align: center" colspan="4">5. PROGRAMACIÓN DE CAMBIO DE FILTROS (TIPO)</th>
                              </tr>
                              <tr>
                                <th style="text-align: center" >CONSUMIBLES</th>
                                <th style="text-align: center" >RESULTADO</th>
                              </tr>
                              
                              <tr>
                                <td>pregunta</td>
                                <td>respuesta</td>
                               
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                              
                             
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                             
                              </tr>
                      
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
                                <th style="text-align: center" >CONSUMIBLES</th>
                                <th style="text-align: center" >RESULTADO</th>
                              </tr>
                              
                              <tr>
                                <td>pregunta</td>
                                <td>respuesta</td>
                               
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                              
                             
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                             
                              </tr>
                      
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
                                <th style="text-align: center" >CONSUMIBLES</th>
                                <th style="text-align: center" >RESULTADO</th>
                              </tr>
                              
                              <tr>
                                <td>pregunta</td>
                                <td>respuesta</td>
                               
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                              
                             
                              </tr>
                              <tr>
                                <td>Pregunta</td>
                                <td>res</td>
                             
                              </tr>
                      
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