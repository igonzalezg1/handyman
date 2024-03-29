@extends('adminlte::page')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)


@section('title', 'Reportes generales')

@section('content_header')

@stop

@section('content')

<div class="container-fluid spark-screen">

    <div class="row">
        <div class="col respaldo">
            <form action="{{url('respaldo')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <input class="form-control" type="date" name="fecha" required>
                    </div>
                    <div class="col-md-3">
                        <input class="btn btn-danger" type="submit" value="Generar respaldo" >
                    </div>


                </div>

            </form>
            <a href="{{route('respaldo')}}" ></a>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 ">

            <!-- Default box -->
            <div class="card " >
                <div class="container=fluid p-3">
                    <div class="card-body" id="f315-div" >

                        <div id="example-table"></div>
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
    <link href="https://unpkg.com/tabulator-tables@5.0.10/dist/css/tabulator.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tabulator-tables@5.0.10/dist/css/tabulator_bootstrap4.min.css" rel="stylesheet">
   <style>
    button{
        margin-left: 20px;
    }
    .botonera{
        margin-bottom: 10px;
        margin-left: 15px;
    }
    #example span {
        display:none;
    }
    .respaldo{
        margin-top: 5%;
        margin-bottom: 5%
    }
    #example-table{
        background-color:rgb(199, 202, 199);
        border: 1px solid #333;
        border-radius: 10px;
    }
    /*Theme the header*/
#example-table .tabulator-header {
    background-color:rgb(216, 16, 16);
    color:rgb(7, 7, 7);
}
#example-table .tabulator-header {
    background-color:rgb(216, 16, 16);
    color:rgb(7, 7, 7);
}
    </style>
@stop

@section('js')

<script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.0.10/dist/js/tabulator.min.js"></script>



    <script>

//define data array

var collection = new Tabulator("#example-table", {

ajaxURL:"igualasc", //ajax URL
ajaxParams:{'_token':'{{ csrf_token()}}'}, //ajax parameters
ajaxConfig:"post", //ajax HTTP request type
layout:"fitColumns",
tooltips:true,
headerFilterPlaceholder:"filter data...", //set column header placeholder text
height:"500px",
history:true,
groupBy:"zona",
history:true,
pagination:"local",
paginationSize:100,
selectable:true,
columns:[
{title:"Zona", field:"zona" , width:150, headerFilter:true},
{title:"Ciudad", field:"ciudad" , width:150, headerFilter:true},
{title:"Top", field:"top", editor:"select", hozAlign:"center", headerFilter:true, width:80, editorParams:{values:["TOP", ""]}},
{title:"Marca", field:"marca", width:100, headerFilter:true},
{title:"CC", field:"cc", hozAlign:"center", width:80, headerFilter:true},
{title:"Sucursal", field:"sucursal", width:150, frozen:true, headerFilter:true},
{title:"Lampara", field:"lampara", editor:"input", hozAlign:"center", width:110},
{title:"Días restantes", field:"dias", hozAlign:"center", width:130, formatter:function(cell, formatterParams){
       var value = cell.getValue();
        if(value <= 50){
            return "<span style='color:red; font-weight:bold;'>" + value + "</span>";
        }else{
            return value;
        }
    }},
{title:"TDS", field:"tds", hozAlign:"center", width:110, formatter:function(cell, formatterParams){
       var value = cell.getValue();
        if(value >= 200){
            return "<span style='color:red; font-weight:bold;'>" + value + "</span>";
        }else{
            return value;
        }
    }},
{title:"Membrana", field:"membrana", width:130, hozAlign:"center"},
{title:"Fecha 3", field:"fecha3", hozAlign:"center", width:120, headerFilter:true},
{title:"Fecha 2", field:"fecha2", hozAlign:"center", width:120, headerFilter:true},
{title:"Fecha 1", field:"fecha1", hozAlign:"center", width:120, headerFilter:true},
{title:"Incidente", field:"accion", hozAlign:"center", editor:"input", width:100, headerFilter:true},
{title:"Fecha de cierre", field:"fecha_cierre", editor:"input", hozAlign:"center", width:120},
{title:"OC", field:"oc", hozAlign:"center", editor:"input", width:100},
{title:"Factura", field:"factura", hozAlign:"center", editor:"input",width:100},
{title:"Ingreso a pp", field:"ingreso", hozAlign:"center", editor:"input", width:100},
{title:"Costo", field:"costo", hozAlign:"center", editor:"input", width:100, formatter:"money",},



],




cellEdited:function(cell){
    console.log('entro');
    //This callback is called any time a cell is edidted var field = cell.getField();
    var claim_no = cell.getData()['top'];
    var val = cell.getValue();
    console.log(field);
    console.log(claim_no);

    },


    rowFormatter:function(row){
        if(row.getData().membrana > 18){
            row.getElement().classList.add("success"); //mark rows with age greater than or equal to 18 as successful;
        }
    },



});



collection.on("cellEdited", function(cell){



    var top=cell.getData()['top'];
    var cc=cell.getData()['cc'];
    var lampara = cell.getData()['lampara'];
    var incidente = cell.getData()['incidente'];
    var fecha_cierre = cell.getData()['fecha_cierre'];
    var oc = cell.getData()['oc'];
    var factura = cell.getData()['factura'];
    var ingreso = cell.getData()['ingreso'];
    var costo = cell.getData()['costo'];
    console.log(top);
    console.log(fecha_cierre);
    console.log(lampara);

   //empieza el ajax
   $.ajax({
             type:'POST',
             url:"{{ route('igualas.save') }}",
             data:{top:top, cc, lampara, incidente, fecha_cierre, oc, factura, ingreso,
             costo, _token: '{{csrf_token()}}'},
             success: function (response) {

              },
          });


});



//Define variables for input elements
var fieldEl = document.getElementById("filter-field");
var typeEl = document.getElementById("filter-type");
var valueEl = document.getElementById("filter-value");

//Custom filter example
function customFilter(data){
    return data.car && data.rating < 3;
}

//Trigger setFilter function with correct parameters
function updateFilter(){
  var filterVal = fieldEl.options[fieldEl.selectedIndex].value;
  var typeVal = typeEl.options[typeEl.selectedIndex].value;

  var filter = filterVal == "function" ? customFilter : filterVal;

  if(filterVal == "function" ){
    typeEl.disabled = true;
    valueEl.disabled = true;
  }else{
    typeEl.disabled = false;
    valueEl.disabled = false;
  }

  if(filterVal){
    table.setFilter(filter,typeVal, valueEl.value);
  }
}

//Update filters on value change
document.getElementById("filter-field").addEventListener("change", updateFilter);
document.getElementById("filter-type").addEventListener("change", updateFilter);
document.getElementById("filter-value").addEventListener("keyup", updateFilter);

//Clear filters on "Clear Filters" button click
document.getElementById("filter-clear").addEventListener("click", function(){
  fieldEl.value = "";
  typeEl.value = "=";
  valueEl.value = "";

  table.clearFilter();
});


    </script>
@stop
