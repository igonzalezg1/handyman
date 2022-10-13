@extends('adminlte.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reportes</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Reportes del bloque: {{ $bloque->c_nombre_bloque }}</h4>
                                <button type="button" class="btn btn-primary w-100" id="daterange-btn">
                                    <i class="far fa-calendar-alt"></i> <span>Selecciona la fecha</span> <i
                                        class="fa fa-caret-down"></i>
                                </button>
                                <br />
                                <br />
                                <div class="table-responsive">
                                    <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="tamanioenca">
                                        <th>Fecha</th>
                                        <th>Sucursal</th>
                                        @foreach ($preguntas as $pregunta)
                                            <th data-bs-toogle="mensaje" title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                                        @endforeach
                                        <th>Ubicacion</th>
                                        </thead>
                                        <tbody>
                                        @foreach($respuestas as $respuesta)
                                            <tr>
                                                <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                                                <td>{{ $respuesta->sucursal }}</td>
                                                @foreach($preguntas as $pregunta)
                                                    @php($preguntax = $pregunta['id_pregunta'])
                                                    @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                                        <td>
                                                            <a data-sub-html="No" target="_blank"
                                                               href="<?= strlen($respuesta->$preguntax) != '' ? "https://fotos.sumapp.cloud/Sumapp/$carpeta/"
                                                                    . $respuesta->$preguntax : '#' ?>"
                                                               evidencia="<?= strlen($respuesta->$preguntax) != '' ? 'true' : 'false' ?>">
                                                                <img style="border-radius:20%;"
                                                                     class="img-responsive thumbnail" width="35px"
                                                                     height="25px"
                                                                     src="<?= strlen($respuesta->$preguntax) != '' ? "https://fotos.sumapp.cloud/Sumapp/$carpeta/"
                                                                        . $respuesta->$preguntax :
                                                                    asset('assets/images/sinimagen.png') ?>"/>
                                                            </a>
                                                        </td>
                                                    @else
                                                        <td>{{ $respuesta->$preguntax }}</td>
                                                    @endif
                                                @endforeach
                                                <td>
                                                    @if ($respuesta->latitud != '' and $respuesta->longitud != '')
                                                        <a class="btn btn-primary btn-md" target="_blank"
                                                           href="https://maps.google.com/?q={{ $respuesta->latitud }},{{ $respuesta->longitud }}"><i class="fas fa-map-marked"></i></a>
                                                    @else
                                                        no se registro ubicacion
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
