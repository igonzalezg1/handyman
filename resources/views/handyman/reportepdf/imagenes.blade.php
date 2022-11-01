@php
    use Carbon\Carbon;
@endphp
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table{
            width:100%;
            page-break-inside: avoid;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Anuncios luminosos</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[0] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[0] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[0] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br/>
            <br/>
            <h2>Alumbrado interior y exterior</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[1] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[1] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[1] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br/>
            <br/>
            <h2>Electrico</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[2] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[2] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[2] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br/>
            <br/>
            <h2>Electrico (Trimestral)</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[3] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[3] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[3] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br/>
            <br/>
            <h2>Conservacion</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[4] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[4] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[4] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br/>
            <br/>
            <h2>Seguridad</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[5] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[5] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[5] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br/>
            <br/>
            <h2>ICA</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[6] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[6] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[6] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br/>
            <br/>
            <h2>Cierre</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @foreach ($preguntas[7] as $pregunta)
                        <th data-bs-toogle="mensaje"
                            title="{{ $pregunta['c_titulo_pregunta'] }}">{{ substr($pregunta['c_titulo_pregunta'], 0, 30) }}</th>
                    @endforeach
                    </thead>
                    <tbody>
                    @foreach($respuestas[7] as $respuesta)
                        <tr>
                            <td>{{ Carbon::parse($respuesta->fecha_registro)->format('Y/m/d') }}</td>
                            <td>{{ $respuesta->sucursal }}</td>
                            @foreach($preguntas[7] as $pregunta)
                                @php($preguntax = $pregunta['id_pregunta'])
                                @if($pregunta['c_tipo_pregunta'] == 'Evidencia')
                                    <td>
                                        <a data-sub-html="No" target="_blank"
                                           href="{{ $respuesta->$preguntax }}"
                                           evidencia="{{ $respuesta->$preguntax }}">
                                            <img style="border-radius:20%;"
                                                 class="img-responsive thumbnail" width="35px"
                                                 height="25px"
                                                 src="{{ $respuesta->$preguntax }}"/>
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $respuesta->$preguntax }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>
