//Variable de idioma
var idioma =

    {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningun dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Ultimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copyTitle": 'Informacion copiada',
            "copyKeys": 'Use your keyboard or menu to select the copy command',
            "copySuccess": {
                "_": '%d filas copiadas al portapapeles',
                "1": '1 fila copiada al portapapeles'
            },

            "pageLength": {
                "_": "Mostrar %d filas",
                "-1": "Mostrar Todo"
            }
        }
    };

//ToolTip
var tooltiptriggerlist = [].slice.call(document.querySelectorAll('[data-bs-toogle="mensaje"]'));
var tooltiplist = tooltiptriggerlist.map(function (tooltiptriggerel) {
    return new bootstrap.Tooltip(tooltiptriggerel);
});


//Filtro de fechas
let año = (new Date).getFullYear();
let mes = (new Date).getMonth() + 1;
let start = moment('' + año + '-' + mes + '').startOf('month');
let end = moment('' + año + '-' + mes + '').endOf('month');
let label = '';

$(document).ready(function () {
    var DataTable = $('#ejemplo').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "language": idioma,
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 50, "Mostrar Todo"]],
        dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
        buttons: {
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: '<i class="fa fa-clipboard"></i> Copiar',
                    title: 'Titulo de tabla copiada',
                    titleAttr: 'Copiar',
                    className: 'btn btn-app export barras',
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    title: 'Titulo de tabla en excel',
                    titleAttr: 'Excel',
                    className: 'btn btn-app export excel',
                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    title: 'Titulo de tabla en CSV',
                    titleAttr: 'CSV',
                    className: 'btn btn-app export csv',
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i>Imprimir',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-app export imprimir',
                },
                {
                    extend: 'pageLength',
                    titleAttr: 'Registros a mostrar',
                    className: 'selectTable'
                }
            ]
        }
    });

    let año = (new Date).getFullYear();
    let mes = (new Date).getMonth() + 1;
    let start = moment('' + año + '-' + mes + '').startOf('month');
    let end = moment('' + año + '-' + mes + '').endOf('month');
    let label = '';

    $('#daterange-btn').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            },
            startDate: moment(start),
            endDate: moment(end),
            ranges: {
                'Hoy': [moment(), moment()],
                'Este año': [moment().subtract(1, 'days').startOf('year'), moment()],
                'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
            }
        },
        function (start, end, label) {
            if (isDate(start)) {
                $('#daterange-btn span').html(start.format('YYYY/MM/DD') + ' - ' + end.format(
                    'YYYY/MM/DD'));
                minDateFilter = start;
                maxDateFilter = end;
                $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                    var date = Date.parse(data[0]);
                    if (
                        (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                        (isNaN(minDateFilter) && date <= maxDateFilter) ||
                        (minDateFilter <= date && isNaN(maxDateFilter)) ||
                        (minDateFilter <= date && date <= maxDateFilter)
                    ) {
                        return true;
                    }
                    return false;
                });
                DataTable.draw();
            }
        });


    function isDate(val) {
        return Date.parse(val);
    }

    function IncDecMonth(Action) {
        if (!isDate(start)) {
            start = moment().startOf('month');
        }
        if (Action == 'Inc') {
            start = moment(start).add(0, 'month').startOf('month');
            end = moment(start).endOf('month')
        } else {
            start = moment(start).subtract(0, 'month').startOf('month');
            end = moment(start).endOf('month')
        }
        if (isDate(start)) {
            $('#daterange-btn span').html(start.format('DD MMM YYYY') + ' - ' + end.format('DD MMM YYYY'));
        }
        minDateFilter = start;
        maxDateFilter = end;
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var date = Date.parse(data[0]);
            if (
                (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                (isNaN(minDateFilter) && date <= maxDateFilter) ||
                (minDateFilter <= date && isNaN(maxDateFilter)) ||
                (minDateFilter <= date && date <= maxDateFilter)
            ) {
                return true;
            }
            return false;
        });
        DataTable.draw();
    }

    IncDecMonth();
});
