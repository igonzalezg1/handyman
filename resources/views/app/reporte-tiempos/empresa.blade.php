@extends('adminlte::page')
@section('content')
    <div class="container-fluid">
        <div class="py-3">
            <h2 class="h2">
                Reporte de tiempos
            </h2>
            <hr>
            <h4 class="h4">
                A continuación se muestran los resultados de visitas en los
                últimos 30 días:
            </h4>
            <span>(Se puede dar clic en las filas para obtener más detalles)</span>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="table-responsive">
                    <table id="TablaReporte" class="table display" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th class="text-center">Promedio de minutos en llevar a cabo una visita</th>
                                <th class="text-center">Promedio de minutos en llegar a una visita</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="row-link"
                                    onclick="toUrl('{{ route('reporte-tiempos.individual', ['id_usuario' => $item->usuario->id_usuario, 'nc' => $item->usuario->nombre_completo, 'avg' => $item->promedio, 'avg_ll' => $item->promedio_en_llegar]) }}')">
                                    <td>{{ $item->usuario->nombre_completo }}</td>
                                    <td>{{ $item->usuario->correo }}</td>
                                    <td class="text-center">{{ number_format($item->promedio) }}</td>
                                    <td class="text-center">{{ number_format($item->promedio_en_llegar) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .row-link {
            cursor: pointer;
        }

        .row-link:hover {
            color: #00A7CF;
            font-weight: 800;
        }

    </style>
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

    <script>
        function toUrl(href) {
            window.location.href = href;
        }
    </script>
@endsection
