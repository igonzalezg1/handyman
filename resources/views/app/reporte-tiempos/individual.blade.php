@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="py-3">
            <h2 class="h2">
                Reporte de tiempos
            </h2>
            <hr>
            <h4 class="h4">
                A continuación se muestran las visitas de {{ $request->get('nc') }} en los
                últimos 30 días:
            </h4>
        </div>
        <div class="mx-auto my-3" style="max-width: 600px !important;">
            <div class="row">
                <div class="col-6">
                    <div class="card card-single">
                        <div class="card-body text-center">
                            <h5>Promedio de minutos en llevar a cabo una visita:</h5>
                            <span style="font-size: 28px; font-weight: 700;">
                                {{ number_format($request->get('avg')) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card card-single">
                        <div class="card-body text-center">
                            <h5>Promedio de minutos en llegar a una visita:</h5>
                            <span style="font-size: 28px; font-weight: 700;">
                                {{ number_format($request->get('avg_ll')) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="table-responsive">
                    <table id="TablaReporte" class="table display" width="100%">
                        <thead>
                            <tr>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th>Sucursal</th>
                                <th class="text-center">Duración en minutos</th>
                                <th class="text-center">Minutos en llegar a visita</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="row-link">
                                    <td>{{ Carbon\Carbon::parse($item->inicio)->format('Y/m/d H:i') }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->fin)->format('Y/m/d H:i') }}</td>
                                    <td>{{ "{$item->sucursal->sucursal}: {$item->localidad}" }}</td>
                                    <td class="text-center">{{ number_format($item->duracion_minutos) }}</td>
                                    <td class="text-center">
                                        {{ $item->tiempo_en_llegar != null ? number_format($item->tiempo_en_llegar) : '' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(window).ready(() => {
            let idiomaTablaReporte = {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningun dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar dato especifico:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "ÃƒÅ¡ltimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": 'Copiar',
                    "colvis": 'Visibilidad de columnas',
                    "copyTitle": 'Informacion copiada',
                    "copyKeys": 'Use your keyboard or menu to select the copy command',
                    "copySuccess": {
                        "_": '%d filas copiadas al portapapeles',
                        "1": '1 fila copiada al portapapeles'
                    },
                    "pageLength": {
                        "_": "Mostrar %d filas",
                        "-1": "Todo"
                    }
                }
            };

            let TablaReporte = $('#TablaReporte').DataTable({
                "language": idiomaTablaReporte,
                "order": [],
                "paging": false,
                "lengthChange": true,
                "searching": true,
                "scrollX": true,
                "info": true,
                "autoWidth": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                "lengthMenu": [
                    [7, 10, 30, 31, -1],
                    [7, 10, 30, 31, "Mostrar Todo"]
                ]
            });
        });
    </script>
@endsection
