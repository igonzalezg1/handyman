@extends('adminlte::page')

@section('plugins.Sweetalert2', false)
@section('plugins.Datatables', true)
    


@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Tickets</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table id="example" class="display nowrap table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Fecha Hora</th>
                    <th>Zona</th>
                    <th>Sucursal</th>
                    <th>Prioridad</th>
                    <th>Estatus</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                    <td><a href="{{ route('tickets.edit', $ticket->id) }}" target="_blank"></a>
                        {{$ticket->updated_at}}</td>
                    <td>{{$ticket->sucursal}}</td>
                    <td>{{$ticket->area}}</td>
                    <td>{{$ticket->prioridad}}</td>
                    <td>{{$ticket->estatus}}</td>
                    <td>{{$ticket->categoria}}</td>
                </tr>  
                @endforeach
             
                
            </tbody>
            <tfoot>
                <tr>
                    <th>Fecha</th>
                    <th>Zona</th>
                    <th>Sucursal</th>
                    <th>Prioridad</th>
                    <th>Estatus</th>
                    <th>Categoría</th>  
                </tr>
            </tfoot>
        </table>
    </div>
</div>





@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

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
        pageLength : 20,
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

$('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.open(href,
            '_blank');
        }
    });

</script>


@stop