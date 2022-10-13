@extends('adminlte::page')

@section('plugins.Sweetalert2', false)
    


@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Ticket</h1>
@stop

@section('content')


<div class="card">
    <div class="card-body">
        <form action="{{ route('tickets.update', $tickets[0]->id) }}" method="post" >
          @csrf
          @method('PUT')
          <input type="hidden" name="empresa" value="{{$tickets[0]->empresa}}">
          <div class="form-row">
            <div class="form-group col-md-2">
              
                <label for="exampleFormControlSelect1">Sucursal</label>
                <input class="form-control" name="{{$tickets[0]->sucursal}}" value="{{$tickets[0]->sucursal}}" disabled>
            </div>
            
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">No. Ticket</label>
                <input class="form-control" name="accion" value="{{$tickets[0]->accion}}" id="exampleFormControlSelect1" disabled>
                  
            </div>
          </div>
         
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="exampleFormControlSelect1">Area</label>
              <input class="form-control" name="area" value="{{$tickets[0]->area}}" id="exampleFormControlSelect1" disabled>
                
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlSelect1">Categoría</label>
                <input class="form-control " value="{{$tickets[0]->categoria}}" name="categoria" disabled>
                
            </div>
            <div class="form-group col-md-4">
              
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="exampleFormControlTextarea1">Descripción</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3">{{$tickets[0]->ticket_descripcion}}</textarea>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleFormControlTextarea1">Observaciones</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" rows="3">{{$tickets[0]->observaciones}}</textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
                <label for="costo">Costo</label>
                <input type="text" class="form-control" value="{{$tickets[0]->costo}}" name="costo" >
              </div>
              <div class="form-group col-md-2">
                <label for="exampleFormControlSelect1">Estatus</label>
                <select class="form-control" name="estatus" id="exampleFormControlSelect1">
                  <option value="{{$tickets[0]->estatus}}" disabled selected>{{$tickets[0]->estatus}}</option>
                   <option value="En proceso">En proceso</option>
                   <option value="Cerrado">Cerrado</option>
                </select>
              </div>
          </div>  
          <div class="form-group ">
           
            <img src="https://fotostickets.sumapp.cloud/Gastronomicaholdings/{{$tickets[0]->evidenciaInicial}}" alt="">
            
          </div>  
            <div class="form-group">
              <input class="btn btn-success" type="submit" value="Actualizar">
            </div>

          </form>
    </div>
</div>


@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
   
    <link href="{{asset('vendor/tabulador/css/tabulator.min.css')}}" rel="stylesheet">
    <style>
      img{
  text-align: center;
  width: 300px;
}
    </style>
@stop

@section('js')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


@stop