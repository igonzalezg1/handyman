@extends('adminlte::page')

@section('plugins.Sweetalert2', false)



@section('title', 'Dashboard')

@section('content_header')
    <h1>Reportes</h1>
@stop

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <h5>Visitas por técnico</h5>
           <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-3 ">
            <input class="form-control" type="text" name="daterange" id="fechaActual"/>
        </div>
        <div class="col-md-4" id="">
            <button class="btn btn-secondary btn-submit">Filtrar</button>
        </div>
    </div>


          <!-- /.row -->
          <div id="historico">
            <canvas id="myChart" width="400" height="200"></canvas>
          </div>
      <h3>Tickets</h3>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$abiertos}}</h3>

              <p>Abiertos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$procesos}}<sup style="font-size: 20px"></sup></h3>

              <p>En proceso</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$cerrados}}</h3>

              <p>Cerrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$abiertos+$cerrados+$procesos}}</h3>

              <p>Total abiertos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>


      <!-- /.row -->

      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@stop

@section('css')

@stop

@section('js')


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });



    $('document').ready(function(){


          $.ajax({
             type:'POST',
             url:"{{ route('home.avances') }}",
             data:{  _token: '{{csrf_token()}}'},
             success: function (data) {


          //  console.log(data);


            avances(data);


              // var list = document.getElementById('myChart').getContext('2d');   // Get the <ul> element with id="myList"
                //  list.removeChild(list.childNodes);         // Remove <ul>'s first child node (index 0)


            },
          });

      });

      $(".btn-submit").click(function(e){

         var daterange = $("input[name=daterange]").val();
            console.log(daterange)
        $.ajax({
             type:'POST',
             url:"{{ route('home.avances') }}",
             data:{daterange,  _token: '{{csrf_token()}}'},
             success: function (data) {


          //  console.log(data);
            $('#myChart').remove();
            $('#historico').append('<canvas id="myChart"></canvas>');
            avances(data);

        },
    });
  });
</script>
<script>

function avances(data){
 var data = data;

const arrayNombres = new Array()
const arrayVisitas = new Array()

 for (let index = 0; index < data.length; index++) {
    arrayNombres.push(data[index].nombre)
    arrayVisitas.push(data[index].visitas)


 }
//console.log(arrayNombres);
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: arrayNombres,
        datasets: [{
            label: '# de Visitas',
            data: arrayVisitas,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
 }


$(function() {

var start = moment().subtract(29, 'days');
var end = moment();

function cb(start, end) {
    $('input[name="daterange"]').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
}

$('input[name="daterange"]').daterangepicker({
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



window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  var anoFin = fecha.getFullYear()+1; //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaActual').value= "01/"+mes+"/"+ano+" - "+dia+"/"+mes+"/"+ano;

}

</script>

@stop
