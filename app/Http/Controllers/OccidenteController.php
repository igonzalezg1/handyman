<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OccidenteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $sucursal= $request->sucursal;



        $datos = DB::connection('mysql2')->select("SELECT * FROM	tb_respuesta WHERE usuario like ? and respuesta like ? ", ['multiserle%', $sucursal.'%']);


        return view('generales.occidente', compact('datos'));
    }

    public function reporte($idrespuesta){


        $registro = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE idrespuesta = ? ", [$idrespuesta]);

       $fecha = $registro[0]->fecha;
       $sucursal = $registro[0]->respuesta;
       $usuario = $registro[0]->usuario;
          $fecha_e = explode("-", $registro[0]->fecha );
          $fecha =  $fecha_e[0].'-'.$fecha_e[1].'-'.$fecha_e[2];
          $hora = $fecha_e[3];
          $no_visita = $registro[0]->no_visita;

          $lat = substr($registro[0]->latitud, 0, 5);
          $lng = substr($registro[0]->longitud, 0, 6);

          $consulta = DB::connection('mysql2')->table('tb_respuesta')
               ->join('tb_encuesta_pregunta', 'tb_respuesta.idpregunta', '=', 'tb_encuesta_pregunta.id_pregunta')
               ->select('tb_respuesta.fecha','tb_respuesta.idpregunta',  'tb_encuesta_pregunta.c_titulo_pregunta', 'tb_respuesta.respuesta', 'tb_respuesta.evidencia')
               ->where('tb_respuesta.no_visita', '=', $no_visita)
               ->where('tb_respuesta.usuario', '=', $usuario)
               ->get();

            $b1p2 = $consulta->where('idpregunta', '=', 19567)->first();
            $b1p3 = $consulta->where('idpregunta', '=', 19568)->first();
            $b1p4 = $consulta->where('idpregunta', '=', 19569)->first();
            $b1p5 = $consulta->where('idpregunta', '=', 19570)->first();
            $b1p6 = $consulta->where('idpregunta', '=', 19639)->first();
            $b1p7 = $consulta->where('idpregunta', '=', 19640)->first();
            $b1p8 = $consulta->where('idpregunta', '=', 19641)->first();

            $b1 = [$b1p2, $b1p3, $b1p4, $b1p5, $b1p6, $b1p7, $b1p8];




               //Bloque 2
    //8
            $b2p1 = $consulta->where('idpregunta', '=', 19653)->first();
            $b2p2 = $consulta->where('idpregunta', '=', 19654)->first();
            $b2p3 = $consulta->where('idpregunta', '=', 19655)->first();
            $b2p4 = $consulta->where('idpregunta', '=', 19656)->first();
            $b2p5 = $consulta->where('idpregunta', '=', 19642)->first();
            $b2p6 = $consulta->where('idpregunta', '=', 19717)->first();
            $b2p7 = $consulta->where('idpregunta', '=', 19657)->first();
            $b2p8 = $consulta->where('idpregunta', '=', 19843)->first();
            $b2p9 = $consulta->where('idpregunta', '=', 19658)->first();
            $b2p10 = $consulta->where('idpregunta', '=', 19659)->first();
     //17
           $b2 = [$b2p1, $b2p2, $b2p3, $b2p4, $b2p5, $b2p6, $b2p7, $b2p8, $b2p9, $b2p10];

           //Bloque 3
       //18
            $b3p2 = $consulta->where('idpregunta', '=', 19580)->first();
            $b3p3 = $consulta->where('idpregunta', '=', 19581)->first();
            $b3p4 = $consulta->where('idpregunta', '=', 19582)->first();
            $b3p5 = $consulta->where('idpregunta', '=', 19583)->first();
            $b3p6 = $consulta->where('idpregunta', '=', 19584)->first();
            $b3p7 = $consulta->where('idpregunta', '=', 19585)->first();
            $b3p8 = $consulta->where('idpregunta', '=', 19597)->first();
            $b3p9 = $consulta->where('idpregunta', '=', 19586)->first();

            $b3p11 = $consulta->where('idpregunta', '=', 19588)->first();
            $b3p12 = $consulta->where('idpregunta', '=', 19599)->first();
            $b3p13 = $consulta->where('idpregunta', '=', 19590)->first();
            $b3p14 = $consulta->where('idpregunta', '=', 19591)->first();
            $b3p15 = $consulta->where('idpregunta', '=', 19592)->first();
            $b3p16 = $consulta->where('idpregunta', '=', 19593)->first();
            $b3p17 = $consulta->where('idpregunta', '=', 19596)->first();
            $b3p18 = $consulta->where('idpregunta', '=', 19594)->first();

            $b3p21 = $consulta->where('idpregunta', '=', 19599)->first();
            $b3p22 = $consulta->where('idpregunta', '=', 19600)->first();
            $b3p23 = $consulta->where('idpregunta', '=', 19601)->first();
            $b3p24 = $consulta->where('idpregunta', '=', 19602)->first();
            $b3p25 = $consulta->where('idpregunta', '=', 19603)->first();
            $b3p26 = $consulta->where('idpregunta', '=', 19604)->first();
            $b3p27 = $consulta->where('idpregunta', '=', 19606)->first();
            $b3p28 = $consulta->where('idpregunta', '=', 19605)->first();
            $b3p29 = $consulta->where('idpregunta', '=', 19595)->first();
            $b3p30 = $consulta->where('idpregunta', '=', 19637)->first();

            $b3p33 = $consulta->where('idpregunta', '=', 19608)->first();
            $b3p34 = $consulta->where('idpregunta', '=', 19609)->first();

            $b3 = [$b3p2, $b3p3, $b3p4, $b3p5, $b3p6, $b3p7, $b3p8, $b3p9, $b3p11,
                         $b3p12, $b3p13, $b3p14, $b3p15, $b3p16, $b3p17, $b3p18, $b3p21, $b3p22,
                         $b3p23, $b3p24, $b3p25, $b3p26, $b3p27, $b3p28, $b3p29, $b3p30, $b3p33, $b3p34   ];
   //45

           //bLOQUE 4
           //46
            $b4p1 = $consulta->where('idpregunta', '=', 19610)->first();
            $b4p2 = $consulta->where('idpregunta', '=', 19611)->first();
            $b4p3 = $consulta->where('idpregunta', '=', 19612)->first();
            $b4p4 = $consulta->where('idpregunta', '=', 19613)->first();
            $b4p5 = $consulta->where('idpregunta', '=', 19614)->first();

           $b4 = [$b4p1, $b4p2, $b4p3, $b4p4, $b4p5];

           //bloque5
           //51
            $b5p2 = $consulta->where('idpregunta', '=', 19627)->first();
            $b5p3 = $consulta->where('idpregunta', '=', 19697)->first();
            $b5p5 = $consulta->where('idpregunta', '=', 19709)->first();
            $b5p6 = $consulta->where('idpregunta', '=', 19710)->first();
            $b5p8 = $consulta->where('idpregunta', '=', 19711)->first();
            $b5p9 = $consulta->where('idpregunta', '=', 19631)->first();

            $b5p14 = $consulta->where('idpregunta', '=', 19633)->first();
            $b5p15 = $consulta->where('idpregunta', '=', 19699)->first();
            $b5p16 = $consulta->where('idpregunta', '=', 19896)->first();
            $b5p17 = $consulta->where('idpregunta', '=', 19897)->first();
            $b5p18 = $consulta->where('idpregunta', '=', 19901)->first();
            $b5p19 = $consulta->where('idpregunta', '=', 19900)->first();

            $b5p26 = $consulta->where('idpregunta', '=', 19827)->first();
            $b5p27 = $consulta->where('idpregunta', '=', 19644)->first();
            $b5p29 = $consulta->where('idpregunta', '=', 19707)->first();
            $b5p30 = $consulta->where('idpregunta', '=', 19700)->first();
           //66
            $b5 = [$b5p2, $b5p3, $b5p5, $b5p6, $b5p8, $b5p9,
           $b5p14, $b5p15, $b5p16, $b5p17, $b5p18, $b5p19,
           $b5p26, $b5p27, $b5p29, $b5p30];

           //bLOque 8
            $b8p1 = $consulta->where('idpregunta', '=', 19703)->first();
            $b8p2 = $consulta->where('idpregunta', '=', 19704)->first();
            $b8p3 = $consulta->where('idpregunta', '=', 19705)->first();
            $b8p4 = $consulta->where('idpregunta', '=', 19706)->first();

            $b8 = [$b8p1, $b8p2, $b8p3, $b8p4];

           //Acciones
            $bap1 = $consulta->where('idpregunta', '=', 19646)->first();
            $bap2 = $consulta->where('idpregunta', '=', 19701)->first();
            $bap3 = $consulta->where('idpregunta', '=', 19647)->first();
            $bap4 = $consulta->where('idpregunta', '=', 19702)->first();
            $bap5 = $consulta->where('idpregunta', '=', 19634)->first();
            $bap6 = $consulta->where('idpregunta', '=', 19638)->first();
            $bap7 = $consulta->where('idpregunta', '=', 19635)->first();
            $bap8 = $consulta->where('idpregunta', '=', 19645)->first();

           $a = [$bap1, $bap2, $bap3, $bap4, $bap5, $bap6, $bap7, $bap8];

         //  $datos = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE fecha like ? and latitud like ? or longitud like ?", [$fecha.'%', $lat.'%', $lng.'%']);


           return view('detallados.occidente', compact('b1', 'b2', 'b3', 'b4', 'b5', 'b8', 'a', 'sucursal',
                                'fecha', 'hora', 'usuario', 'idrespuesta'
                                               ));
       }

       public function exportpdf($idrespuesta){

        $data = [

            'poliza' => 'si',

        ];


        $pdf = \PDF::loadView('detallados.pdf', $data)
        ->setPaper('a4', 'landscape');
        return $pdf->stream();
        return $pdf->download('poliza.pdf');
    }

       public function exportfpdf($idrespuesta){

        $registro = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE idrespuesta = ? ", [$idrespuesta]);


                $fecha = $registro[0]->fecha;
                $sucursal = $registro[0]->respuesta;
                $usuario = $registro[0]->usuario;
                   $fecha_e = explode("-", $registro[0]->fecha );
                   $fecha =  $fecha_e[0].'-'.$fecha_e[1].'-'.$fecha_e[2];
                   $hora = $fecha_e[3];
                   $no_visita = $registro[0]->no_visita;


                   $consulta = DB::connection('mysql2')->table('tb_respuesta')
                        ->join('tb_encuesta_pregunta', 'tb_respuesta.idpregunta', '=', 'tb_encuesta_pregunta.id_pregunta')
                        ->select('tb_respuesta.fecha','tb_respuesta.idpregunta',  'tb_encuesta_pregunta.c_titulo_pregunta', 'tb_respuesta.respuesta', 'tb_respuesta.evidencia')
                        ->where('tb_respuesta.no_visita', '=', $no_visita)
                        ->get();



                $b1p5 = $consulta->where('idpregunta', '=', 19570)->first();
                if ($b1p5->evidencia != null and isset($b1p5)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p5->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $base64 = '';
            }
                $b1p6 = $consulta->where('idpregunta', '=', 19639)->first();
                if ($b1p6->evidencia != null and isset($b1p6)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p6->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $bypassAguaFiltrada = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $bypassAguaFiltrada = '';
            }
                $b1p7 = $consulta->where('idpregunta', '=', 19640)->first();
                if ($b1p7->evidencia != null and isset($b1p7)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p7->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $bypassAguaProducto = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $bypassAguaProducto = '';
            }
                $b1p8 = $consulta->where('idpregunta', '=', 19641)->first();
                if ($b1p8->evidencia != null and isset($b1p8)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p8->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $fotoPizarra = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $fotoPizarra = '';
            }



                   //Bloque 2
                 $b2p1 = $consulta->where('idpregunta', '=', 19642)->first();
                if ( isset($b2p1) and $b2p1->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p1->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $multimediaAg = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $multimediaAg = '';
                }
                $b2p2 = $consulta->where('idpregunta', '=', 19642)->first();
                if ( isset($b2p2) and $b2p2->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p2->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $carbonActivado = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $carbonActivado = '';
                }
                $b2p3 = $consulta->where('idpregunta', '=', 19642)->first();
                if ( isset($b2p3) and $b2p3->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p3->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $resina = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $resina = '';
                }
        //8
                $b2p5 = $consulta->where('idpregunta', '=', 19642)->first();
                if ( isset($b2p5) and $b2p5->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p5->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $nivelSalInicial = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $nivelSalInicial = '';
                }
                $b2p8 = $consulta->where('idpregunta', '=', 19843)->first();
                if ( isset($b2p8) and $b2p8->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p8->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $salFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $salFinal = '';
                }

         //17


               //Bloque 3
           //18



           $b3p8 = $consulta->where('idpregunta', '=', 19597)->first();
           if (isset($b3p8) and $b3p8->evidencia != null) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p8->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $tdsAguaCruda = 'data:image/' . $type . ';base64,' . base64_encode($data);

           }else{
                 $tdsAguaCruda = '';
                }

           $b3p17 = $consulta->where('idpregunta', '=', 19596)->first();
           if (isset($b3p17) and $b3p17->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p17->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $tds = 'data:image/' . $type . ';base64,' . base64_encode($data);
           }else{
            $tds = '';
           }

           $b3p27 = $consulta->where('idpregunta', '=', 19606)->first();
           if (isset($b3p27) and $b3p27->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p27->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $tdsAguaProducto = 'data:image/' . $type . ';base64,' . base64_encode($data);
           }else{
                $tdsAguaProducto = '';
           }
           $b3p30 = $consulta->where('idpregunta', '=', 19637)->first();
           if (isset($b3p30) and $b3p30->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p30->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $produccionMembrana = "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p30->evidencia;
           }else{
                $produccionMembrana = '';
           }
           $b3p34 = $consulta->where('idpregunta', '=', 19609)->first();
           if (isset($b3p34) and $b3p34->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p34->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $moduloContador = "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p34->evidencia;
           }else{
                $moduloContador = '';
           }



       //4

            $b4p1 = $consulta->where('idpregunta', '=', 19610)->first();
                if (isset($b4p1) and $b4p1->evidencia != null ) {
                        $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p1->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $funcionaBomba = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    }else{

                        $funcionaBomba = '';
                    }
            $b4p2 = $consulta->where('idpregunta', '=', 19611)->first();
                if (isset($b4p2) and $b4p2->evidencia != null ) {
                        $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p2->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                        $switchPresion = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    }else{

                        $switchPresion = '';
                    }

               //bloque5
               //51

               $b4p3 = $consulta->where('idpregunta', '=', 19613)->first();
               if (isset($b4p3) and $b4p3->evidencia != null ) {
                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p3->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $funcionaManometro = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{

                    $funcionaManometro = '';
                }


                $b4p4 = $consulta->where('idpregunta', '=', 19612)->first();
                if (isset($b4p4) and $b4p4->evidencia != null ) {
                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p4->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $tanquePrecargado = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $tanquePrecargado = '';
                }
                $b4p5 = $consulta->where('idpregunta', '=', 19614)->first();
                if (isset($b4p5) and $b4p5->evidencia != null ) {
                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p5->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $proteccionBomba = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $proteccionBomba = '';
                }


                $b5p29 = $consulta->where('idpregunta', '=', 19707)->first();
                if (isset($b5p29) and $b5p29->evidencia != null ) {
                     $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b5p29->evidencia;
                 $type = pathinfo($path, PATHINFO_EXTENSION);
                 $data = file_get_contents($path);
                 $filtroLimpio = 'data:image/' . $type . ';base64,' . base64_encode($data);
                 }else{

                     $filtroLimpio = '';
                 }


                 $b5p30 = $consulta->where('idpregunta', '=', 19700)->first();
                 if (isset($b5p30) and $b5p30->evidencia != null ) {
                     $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b5p30->evidencia;
                     $type = pathinfo($path, PATHINFO_EXTENSION);
                     $data = file_get_contents($path);
                     $filtroSucio = 'data:image/' . $type . ';base64,' . base64_encode($data);
                 }else{
                     $filtroSucio = '';
                 }




               //66


               //bLOque 8

                $b8p4 = $consulta->where('idpregunta', '=', 19706)->first();
                if (isset($b8p4) and $b8p4->evidencia != null ) {

                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b8p4->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $evidenciaFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);

                }else{
                    $evidenciaFinal = '';
                }




                //Acciones

         $bap3 = $consulta->where('idpregunta', '=', 19702)->first();
         if(isset($bap3) and $bap3->evidencia != null ){
         $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$bap3->evidencia;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $pizarraFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
         }else{
            $pizarraFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
         }
         $bap4 = $consulta->where('idpregunta', '=', 19634)->first();
         if (isset($bap4) and $bap4->evidencia != null ) {
		 $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$bap4->evidencia;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $reporteFinalSello = 'data:image/' . $type . ';base64,' . base64_encode($data);
		 }else{
		 $reporteFinalSello = '';
		 }


         $bap5 = $consulta->where('idpregunta', '=', 19638)->first();
		 if (isset($bap5) and $bap5->evidencia != null ) {
         $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$bap5->evidencia;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $consumibleSello = 'data:image/' . $type . ';base64,' . base64_encode($data);
		 }else{
			 $consumibleSello = '';
		 }

         $bap7 = $consulta->where('idpregunta', '=', 19645)->first();
         if(isset($bap7) and $bap7->evidencia != null ){
         $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$bap7->evidencia;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $casoUrgente = 'data:image/' . $type . ';base64,' . base64_encode($data);
         }else{
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

        $pdf = \PDF::loadView('detallados.pdf', $data)
        ->setPaper('a4');
        return $pdf->stream();
        return $pdf->download('poliza.pdf');
    }
}
