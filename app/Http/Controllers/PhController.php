<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhController extends Controller
{
    public function index(Request $request)
    {

        $sucursal = $request->sucursal;
        //recordar quitar para prueba multiserle
        $datos = DB::connection('mysql2')->select("SELECT * FROM	tb_respuesta WHERE usuario like ? and respuesta like ? ", ['%multiserle%', '%' . $sucursal . '%']);

        return view('generales.index', compact('datos'));
    }
    public function reporte(Int $idrespuesta)
    {

        $no_visita = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE idrespuesta = ? LIMIT 1", [$idrespuesta]);
        $registro = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE no_visita = ? ", [$no_visita[0]->no_visita]);

        $fecha = $registro[0]->fecha;
        $sucursal = $registro[0]->respuesta;
        $usuario = $registro[0]->usuario;
        $fecha_e = explode("-", $registro[0]->fecha);
        $fecha =  $fecha_e[0] . '-' . $fecha_e[1] . '-' . $fecha_e[2];
        $hora = $fecha_e[3];
        $no_visita = $registro[0]->no_visita;


        $resultado=[];


        $consulta = DB::connection('mysql2')->table('tb_respuesta')
            ->join('tb_encuesta_pregunta', 'tb_respuesta.idpregunta', '=', 'tb_encuesta_pregunta.id_pregunta')
            ->select('tb_respuesta.fecha', 'tb_respuesta.idpregunta',  'tb_encuesta_pregunta.c_titulo_pregunta', 'tb_respuesta.respuesta', 'tb_respuesta.evidencia')
            ->where('tb_respuesta.no_visita', '=', $no_visita)
            ->get();

        $consulta = collect($consulta)->unique('c_titulo_pregunta');


        $b1 = $consulta->whereIn('c_titulo_pregunta',[
            'By pass inicial',
            'Evidencia Bypass agua cruda',
            'Normal Inicial',
            'Evidencia bypass agua filtrada',
            'Apagado Inicial',
            'Evidencia bypass agua producto',
            'Foto de pizarra'
        ]);

      //  $b1 = collect($b1);

      //  return $b1->c_titulo_pregunta;

        foreach ($b1 as $preg) {
            array_push($resultado, [
                'bloque' => 1,
                'c_titulo_pregunta' => $preg->c_titulo_pregunta,
                'respuesta' => $preg->respuesta,
                'evidencia' => $preg->evidencia

            ]);
        }


        //Bloque 2
        //8
        $b2 = $consulta->whereIn('c_titulo_pregunta',
                ['Multimedia AG (o turbiedad)',
                'Carbon Activado (o cloro)',
                'Resina (o 100 PPM dureza)',
                'Nivel de sal inicial',
                'Evidencia nivel de sal inicial',
                'Recargas de bultos de sal',
                'Nivel de sal final',
                'Nivel de Sal Final',
                'Retrolavado suavizador',
                'Retrolavado carbon'
             ]);

             foreach ($b2 as $preg) {
                array_push($resultado, [
                    'bloque' => 2,
                    'c_titulo_pregunta' => $preg->c_titulo_pregunta,
                    'respuesta' => $preg->respuesta,
                    'evidencia' => $preg->evidencia

                ]);
            }
        //Bloque 3
        //18
        $b3 = $consulta->whereIn('c_titulo_pregunta',
            ['Cloro libre (PPM) 0.2 - 1.5',
                'Cloro total (PPM) 0.2 -1.5',
                'Dureza (PPM) 500 max',
                'Alcalinidad (PPM) 400max',
                'PH  6.5 - 8.5',
                'TDS (PPM) 1000 max',
                'Evidencia TDS agua cruda',
                'Presion de operacion  45 - 60 (PSI)',
                'Cloro libre (PPM) 0.2 - 1.5',
                'Cloro total (PPM)  0.2 - 1.5',
                'Dureza (PPM)  500 max',
                'Alcalinidad (PPM)  400 max',
                'PH   6.5 - 8.5',
                'TDS (PPM)  70 - 200',
                'Evidencia TDS',
                'Presion de operacion (PSI)  45 - 60',
                'Cloro libre (PPM) <0.5',
                'Cloro total (PPM) <0.5',
                'Dureza (PPM) 17-85',
                'Alcalinidad (PPM) <100',
                'PH 6.8 - 7.4',
                'TDS (PPM)  70 - 200',
                'Evidencia TDS agua producto',
                'Presion de operacion (PSI)',
                'Produccion de membranas  >750ml/min',
                'Evidencia Produccion membrana ',
                'Lampara UV dias de vida util. Minimo 30',
                'Evidencia modulo contador'
            ]);


        foreach ($b3 as $preg) {
            array_push($resultado, [
                'bloque' => 3,
                'c_titulo_pregunta' => $preg->c_titulo_pregunta,
                'respuesta' => $preg->respuesta,
                'evidencia' => $preg->evidencia

            ]);
        }



        //bLOQUE 4
        //46
        $b4= $consulta->whereIn('c_titulo_pregunta',
            ['Funciona bomba',
            'Funciona switch de presion',
            'Funciona manometros',
            'Funciona tranque precargado',
            'Funciona proteccion de bomba',
             ]);
        foreach ($b4 as $preg) {
                array_push($resultado, [
                    'bloque' => 4,
                    'c_titulo_pregunta' => $preg->c_titulo_pregunta,
                    'respuesta' => $preg->respuesta,
                    'evidencia' => $preg->evidencia

                ]);
            }



        //bloque5
        //51
        $b5 = $consulta->whereIn('c_titulo_pregunta',
             ['Tipo de sedimientos',
                'Frecuencia',
                'Tipo de sedimiento filtro 2 (si aplica)',
                'Frecuencia filtro 2 (si aplica)',
                'Tipo de sedimiento filtro 3 (si aplica)',
                'Frecuencia filtro 3 (si aplica)',
                'Tipo de filtro carbon',
                'Frecuencia',
                'Tipo filtro carbon 2 (si aplica)',
                'Frecuencia filtro carbon 2 (si palica)',
                'Tipo filtro carbon 3 (si aplica)',
                'Frecuencia filtro carbon 3 (si aplica)',
                'Tipo Prefiltro',
                'Frecuencia de prefiltro',
                'Evidencias filtro limpio',
                'Evidencias antes (filtro sucio)'
        ]);
        foreach ($b5 as $preg) {
            array_push($resultado, [
                'bloque' => 5,
                'c_titulo_pregunta' => $preg->c_titulo_pregunta,
                'respuesta' => $preg->respuesta,
                'evidencia' => $preg->evidencia

            ]);
        }




        //bLOque 8
        $b8 = $consulta->whereIn('c_titulo_pregunta', [
            'Se realizo accion de mantenimiento preventivo?',
            'Se realizo cambio de filtros?',
            'Recarga de sal?',
            'Foto de pizarra final'
        ]);

        foreach ($b8 as $preg) {
            array_push($resultado, [
                'bloque' => 8,
                'c_titulo_pregunta' => $preg->c_titulo_pregunta,
                'respuesta' => $preg->respuesta,
                'evidencia' => $preg->evidencia

            ]);
        }


        //Acciones
        $b9 = $consulta->whereIn('c_titulo_pregunta',
            ['Foto de reporte final con sello de tienda',
            'Foto reporte consumibles con sello de tienda',
            'Comentarios en caso de urgencia',
            'Foto evidencia caso urgente',
            'By Pass final',
            'Normal Final',
            'Apagado final',
            'Evidencia final'
    ]);

        foreach ($b9 as $preg) {
            array_push($resultado, [
                'bloque' => 9,
                'c_titulo_pregunta' => $preg->c_titulo_pregunta,
                'respuesta' => $preg->respuesta,
                'evidencia' => $preg->evidencia

            ]);
        }
       ;
        $resultado = collect($resultado);



        //  $datos = DB::select("SELECT * FROM tb_respuesta WHERE fecha like ? and latitud like ? or longitud like ?", [$fecha.'%', $lat.'%', $lng.'%']);


        return view('detallados.index', compact('fecha','hora', 'sucursal', 'usuario', 'idrespuesta','resultado', 'consulta', 'b5',
        ));
    }

    public function exportfpdf($idrespuesta)
    {
        $no_visita = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE idrespuesta = ? LIMIT 1", [$idrespuesta]);
        $registro = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE no_visita = ? ", [$no_visita[0]->no_visita]);

        $fecha = $registro[0]->fecha;
        $sucursal = $registro[0]->respuesta;
        $usuario = $registro[0]->usuario;
        $fecha_e = explode("-", $registro[0]->fecha);
        $fecha =  $fecha_e[0] . '-' . $fecha_e[1] . '-' . $fecha_e[2];
        $hora = $fecha_e[3];
        $no_visita = $registro[0]->no_visita;


        $resultado=[];


        $consulta = DB::connection('mysql2')->table('tb_respuesta')
            ->join('tb_encuesta_pregunta', 'tb_respuesta.idpregunta', '=', 'tb_encuesta_pregunta.id_pregunta')
            ->select('tb_respuesta.fecha', 'tb_respuesta.idpregunta',  'tb_encuesta_pregunta.c_titulo_pregunta', 'tb_respuesta.respuesta', 'tb_respuesta.evidencia')
            ->where('tb_respuesta.no_visita', '=', $no_visita)
            ->get();


        $b1p5 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia Bypass agua cruda')->first();
        if ($b1p5->evidencia != null and isset($b1p5)) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b1p5->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $base64 = '';
        }
        $b1p6 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia bypass agua filtrada')->first();
        if ($b1p6->evidencia != null and isset($b1p6)) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b1p6->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $bypassAguaFiltrada = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $bypassAguaFiltrada = '';
        }
        $b1p7 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia bypass agua producto')->first();
        if ($b1p7->evidencia != null and isset($b1p7)) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b1p7->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $bypassAguaProducto = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $bypassAguaProducto = '';
        }
        $b1p8 = $consulta->where('c_titulo_pregunta', '=', 'Foto de pizarra')->first();
        if ($b1p8->evidencia != null and isset($b1p8)) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b1p8->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $fotoPizarra = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $fotoPizarra = '';
        }

        //Bloque 2
        $b2p1 = $consulta->where('c_titulo_pregunta', '=', 'Multimedia AG (o turbiedad)')->first();
        if (isset($b2p1) and $b2p1->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b2p1->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $multimediaAg = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $multimediaAg = '';
        }
        $b2p2 = $consulta->where('c_titulo_pregunta', '=', 'Carbon Activado (o cloro)')->first();
        if (isset($b2p2) and $b2p2->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b2p2->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $carbonActivado = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $carbonActivado = '';
        }
        $b2p3 = $consulta->where('c_titulo_pregunta', '=', 'Resina (o 100 PPM dureza)')->first();
        if (isset($b2p3) and $b2p3->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b2p3->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $resina = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $resina = '';
        }
        //8
        $b2p5 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia nivel de sal inicial')->first();
        if (isset($b2p5) and $b2p5->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b2p5->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $nivelSalInicial = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
               $nivelSalInicial = '';
        }
        $b2p8 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia de Sal Final')->first();
        if (isset($b2p8) and $b2p8->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b2p8->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $salFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $salFinal = '';
        }

        //17


        //Bloque 3
        //18



        $b3p8 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia TDS agua cruda')->first();
        if (isset($b3p8) and $b3p8->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b3p8->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $tdsAguaCruda = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $tdsAguaCruda = '';
        }

        $b3p17 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia TDS')->first();
        if (isset($b3p17) and $b3p17->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b3p17->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $tds = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $tds = '';
        }

        $b3p27 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia TDS agua producto')->first();
        if (isset($b3p27) and $b3p27->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b3p27->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $tdsAguaProducto = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $tdsAguaProducto = '';
        }
        $b3p30 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia Produccion membrana ')->first();
        if (isset($b3p30) and $b3p30->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b3p30->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $produccionMembrana = "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b3p30->evidencia;
        } else {
            $produccionMembrana = '';
        }
        $b3p34 = $consulta->where('c_titulo_pregunta', '=', 'Evidencia modulo contador')->first();
        if (isset($b3p34) and $b3p34->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b3p34->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $moduloContador = "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b3p34->evidencia;
        } else {
            $moduloContador = '';
        }



        //4

        $b4p1 = $consulta->where('c_titulo_pregunta', '=', 'Funciona bomba')->first();
        if (isset($b4p1) and $b4p1->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b4p1->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $funcionaBomba = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {

            $funcionaBomba = '';
        }
        $b4p2 = $consulta->where('c_titulo_pregunta', '=', 'Funciona switch de presion')->first();
        if (isset($b4p2) and $b4p2->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b4p2->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $switchPresion = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {

            $switchPresion = '';
        }

        //bloque5
        //51

        $b4p3 = $consulta->where('c_titulo_pregunta', '=', 'Funciona manometros')->first();
        if (isset($b4p3) and $b4p3->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b4p3->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $funcionaManometro = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {

            $funcionaManometro = '';
        }


        $b4p4 = $consulta->where('c_titulo_pregunta', '=', 'Funciona tranque precargado')->first();
        if (isset($b4p4) and $b4p4->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b4p4->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $tanquePrecargado = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $tanquePrecargado = '';
        }
        $b4p5 = $consulta->where('c_titulo_pregunta', '=', 'Funciona proteccion de bomba')->first();
        if (isset($b4p5) and $b4p5->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b4p5->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $proteccionBomba = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $proteccionBomba = '';
        }


        $b5p29 = $consulta->where('c_titulo_pregunta', '=', 'Evidencias filtro limpio')->first();
        if (isset($b5p29) and $b5p29->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b5p29->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $filtroLimpio = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {

            $filtroLimpio = '';
        }


        $b5p30 = $consulta->where('c_titulo_pregunta', '=', 'Evidencias antes (filtro sucio)')->first();
        if (isset($b5p30) and $b5p30->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b5p30->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $filtroSucio = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $filtroSucio = '';
        }




        //66


        //bLOque 8

        $b8p4 = $consulta->where('c_titulo_pregunta', '=', 'Foto de pizarra final')->first();
        if (isset($b8p4) and $b8p4->evidencia != null) {

            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $b8p4->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $evidenciaFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $evidenciaFinal = '';
        }




        //Acciones

        $bap3 = $consulta->where('c_titulo_pregunta', '=', 'Comentarios en caso de urgencia')->first();
        if (isset($bap3) and $bap3->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $bap3->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $pizarraFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $pizarraFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        $bap4 = $consulta->where('c_titulo_pregunta', '=', 'Foto evidencia caso urgente')->first();
        if (isset($bap4) and $bap4->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $bap4->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $reporteFinalSello = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $reporteFinalSello = '';
        }


        $bap5 = $consulta->where('c_titulo_pregunta', '=', 'By Pass final')->first();
        if (isset($bap5) and $bap5->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $bap5->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $consumibleSello = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $consumibleSello = '';
        }

        $bap7 = $consulta->where('c_titulo_pregunta', '=', 'Apagado final')->first();
        if (isset($bap7) and $bap7->evidencia != null) {
            $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/" . $bap7->evidencia;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $casoUrgente = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $casoUrgente = '';
        }



        $data = [
            'byAguaCruda' => $base64,
            'bypassAguaFiltrada' => $bypassAguaFiltrada,
            'bypassAguaProducto' => $bypassAguaProducto,
            'fotoPizarra' => $fotoPizarra,
            'nivelSalInicial' => $nivelSalInicial,
            'salFinal' => $salFinal,
            'multimediaAg' => $multimediaAg,
            'carbonActivado' => $carbonActivado,
            'resina' => $resina,
            'tdsAguaCruda' => $tdsAguaCruda,
            'tds' => $tds,
            'tdsAguaProducto' => $tdsAguaProducto,
            'produccionMembrana' => $produccionMembrana,
            'moduloContador' => $moduloContador,
            'funcionaBomba' => $funcionaBomba,
            'switchPresion' => $switchPresion,
            'funcionaManometro' => $funcionaManometro,
            'tanquePrecargado' => $tanquePrecargado,
            'proteccionBomba' => $proteccionBomba,
            'filtroLimpio' => $filtroLimpio,
            'filtroSucio' => $filtroSucio,
            'evidenciaFinal' => $evidenciaFinal,
            'pizarraFinal' => $pizarraFinal,
            'reporteFinalSello' => $reporteFinalSello,

            'consumibleSello' => $consumibleSello,
            'casoUrgente' => $casoUrgente,
            'sucursal' => $sucursal,
            'usuario' => $usuario,
            'fecha' => $fecha,
            'hora' => $hora

        ];

        set_time_limit(300); // Extends to 5 minutes.
        $pdf = \PDF::loadView('detallados.pdf', $data)
            ->setPaper('a4');
        return $pdf->stream();
        return $pdf->download('poliza.pdf');
    }
}
