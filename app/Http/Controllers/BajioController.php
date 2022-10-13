<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BajioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){

        $sucursal= $request->sucursal;



        $datos = DB::connection('mysql2')->select("SELECT * FROM	tb_respuesta WHERE usuario like ? and respuesta like ? ", ['multiserle%', '%'.$sucursal.'%']);


        return view('generales.bajio', compact('datos'));
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


         $consulta = DB::connection('mysql2')->table('tb_respuesta')
               ->join('tb_encuesta_pregunta', 'tb_respuesta.idpregunta', '=', 'tb_encuesta_pregunta.id_pregunta')
               ->select('tb_respuesta.fecha','tb_respuesta.idpregunta',  'tb_encuesta_pregunta.c_titulo_pregunta', 'tb_respuesta.respuesta', 'tb_respuesta.evidencia')
               ->where('tb_respuesta.no_visita', '=', $no_visita)

               ->get();

            $b1p2 = $consulta->where('idpregunta', '=', 19310)->first();
            $b1p3 = $consulta->where('idpregunta', '=', 19311)->first();
            $b1p4 = $consulta->where('idpregunta', '=', 19312)->first();
            $b1p5 = $consulta->where('idpregunta', '=', 19313)->first();
            $b1p6 = $consulta->where('idpregunta', '=', 19431)->first();
            $b1p7 = $consulta->where('idpregunta', '=', 19432)->first();
            $b1p8 = $consulta->where('idpregunta', '=', 19433)->first();

            $b1 = [$b1p2, $b1p3, $b1p4, $b1p5, $b1p6, $b1p7, $b1p8];




               //Bloque 2
    //8
            $b2p1 = $consulta->where('idpregunta', '=', 19321)->first();
            $b2p2 = $consulta->where('idpregunta', '=', 19322)->first();
            $b2p3 = $consulta->where('idpregunta', '=', 19323)->first();
            $b2p4 = $consulta->where('idpregunta', '=', 19324)->first();
            $b2p5 = $consulta->where('idpregunta', '=', 19434)->first();
            $b2p6 = $consulta->where('idpregunta', '=', 19829)->first();
            $b2p7 = $consulta->where('idpregunta', '=', 19325)->first();
            $b2p8 = $consulta->where('idpregunta', '=', 19841)->first();
            $b2p9 = $consulta->where('idpregunta', '=', 19326)->first();
            $b2p10 = $consulta->where('idpregunta', '=', 19327)->first();
     //17
           $b2 = [$b2p1, $b2p2, $b2p3, $b2p4, $b2p5, $b2p6, $b2p7, $b2p8, $b2p9, $b2p10];

           //Bloque 3
       //18
            $b3p2 = $consulta->where('idpregunta', '=', 19329)->first();
            $b3p3 = $consulta->where('idpregunta', '=', 19330)->first();
            $b3p4 = $consulta->where('idpregunta', '=', 19331)->first();
            $b3p5 = $consulta->where('idpregunta', '=', 19333)->first();
            $b3p6 = $consulta->where('idpregunta', '=', 19334)->first();
            $b3p7 = $consulta->where('idpregunta', '=', 19335)->first();
            $b3p8 = $consulta->where('idpregunta', '=', 19347)->first();
            $b3p9 = $consulta->where('idpregunta', '=', 19336)->first();

            $b3p11 = $consulta->where('idpregunta', '=', 19338)->first();
            $b3p12 = $consulta->where('idpregunta', '=', 19339)->first();
            $b3p13 = $consulta->where('idpregunta', '=', 19340)->first();
            $b3p14 = $consulta->where('idpregunta', '=', 19341)->first();
            $b3p15 = $consulta->where('idpregunta', '=', 19342)->first();
            $b3p16 = $consulta->where('idpregunta', '=', 19343)->first();
            $b3p17 = $consulta->where('idpregunta', '=', 19346)->first();
            $b3p18 = $consulta->where('idpregunta', '=', 19344)->first();

            $b3p21 = $consulta->where('idpregunta', '=', 19349)->first();
            $b3p22 = $consulta->where('idpregunta', '=', 19350)->first();
            $b3p23 = $consulta->where('idpregunta', '=', 19351)->first();
            $b3p24 = $consulta->where('idpregunta', '=', 19352)->first();
            $b3p25 = $consulta->where('idpregunta', '=', 19353)->first();
            $b3p26 = $consulta->where('idpregunta', '=', 19354)->first();
            $b3p27 = $consulta->where('idpregunta', '=', 19356)->first();
            $b3p28 = $consulta->where('idpregunta', '=', 19355)->first();
            $b3p29 = $consulta->where('idpregunta', '=', 19345)->first();
            $b3p30 = $consulta->where('idpregunta', '=', 19392)->first();

            $b3p33 = $consulta->where('idpregunta', '=', 19358)->first();
            $b3p34 = $consulta->where('idpregunta', '=', 19359)->first();

            $b3 = [$b3p2, $b3p3, $b3p4, $b3p5, $b3p6, $b3p7, $b3p8, $b3p9, $b3p11,
                         $b3p12, $b3p13, $b3p14, $b3p15, $b3p16, $b3p17, $b3p18, $b3p21, $b3p22,
                         $b3p23, $b3p24, $b3p25, $b3p26, $b3p27, $b3p28, $b3p29, $b3p30, $b3p33, $b3p34   ];
   //45

           //bLOQUE 4
           //46
            $b4p1 = $consulta->where('idpregunta', '=', 19360)->first();
            $b4p2 = $consulta->where('idpregunta', '=', 19361)->first();
            $b4p3 = $consulta->where('idpregunta', '=', 19363)->first();
            $b4p4 = $consulta->where('idpregunta', '=', 19362)->first();
            $b4p5 = $consulta->where('idpregunta', '=', 19364)->first();

           $b4 = [$b4p1, $b4p2, $b4p3, $b4p4, $b4p5];

           //bloque5
           //51
            $b5p2 = $consulta->where('idpregunta', '=', 19380)->first();
            $b5p3 = $consulta->where('idpregunta', '=', 19366)->first();
            $b5p5 = $consulta->where('idpregunta', '=', 19381)->first();
            $b5p6 = $consulta->where('idpregunta', '=', 19382)->first();
            $b5p8 = $consulta->where('idpregunta', '=', 19384)->first();
            $b5p9 = $consulta->where('idpregunta', '=', 19385)->first();

            $b5p14 = $consulta->where('idpregunta', '=', 19387)->first();
            $b5p15 = $consulta->where('idpregunta', '=', 19369)->first();
            $b5p16 = $consulta->where('idpregunta', '=', 19844)->first();
            $b5p17 = $consulta->where('idpregunta', '=', 19845)->first();
            $b5p18 = $consulta->where('idpregunta', '=', 19846)->first();
            $b5p19 = $consulta->where('idpregunta', '=', 19847)->first();

            $b5p26 = $consulta->where('idpregunta', '=', 19823)->first();
            $b5p27 = $consulta->where('idpregunta', '=', 19436)->first();
            $b5p29 = $consulta->where('idpregunta', '=', 19379)->first();
            $b5p30 = $consulta->where('idpregunta', '=', 19371)->first();
           //66


                $b5 = [$b5p2, $b5p3, $b5p5, $b5p6, $b5p8, $b5p9,
                $b5p14, $b5p15, $b5p16, $b5p17, $b5p18, $b5p19,
                $b5p26, $b5p27, $b5p29, $b5p30];

           //bLOque 8
            $b8p1 = $consulta->where('idpregunta', '=', 19375)->first();
            $b8p2 = $consulta->where('idpregunta', '=', 19376)->first();
            $b8p3 = $consulta->where('idpregunta', '=', 19377)->first();
            $b8p4 = $consulta->where('idpregunta', '=', 19378)->first();


            $b8 = [$b8p1, $b8p2, $b8p3, $b8p4];

           //Acciones
            $bap1 = $consulta->where('idpregunta', '=', 19438)->first();
            $bap2 = $consulta->where('idpregunta', '=', 19372)->first();
            $bap3 = $consulta->where('idpregunta', '=', 19439)->first();
            $bap4 = $consulta->where('idpregunta', '=', 19374)->first();
            $bap5 = $consulta->where('idpregunta', '=', 19389)->first();
            $bap6 = $consulta->where('idpregunta', '=', 19393)->first();
            $bap7 = $consulta->where('idpregunta', '=', 19390)->first();
            $bap8 = $consulta->where('idpregunta', '=', 19437)->first();

           $a = [$bap1, $bap2, $bap3, $bap4, $bap5, $bap6, $bap7, $bap8];

         //  $datos = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE fecha like ? and latitud like ? or longitud like ?", [$fecha.'%', $lat.'%', $lng.'%']);


           return view('detallados.bajio', compact('b1', 'b2', 'b3', 'b4', 'b5', 'b8', 'a', 'sucursal', 'usuario', 'fecha'
                                            , 'hora', 'idrespuesta'  ));
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


                $b1p5 = $consulta->where('idpregunta', '=', 19313)->first();
                if ($b1p5->evidencia != null and isset($b1p5)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p5->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $base64 = '';
            }
                $b1p6 = $consulta->where('idpregunta', '=', 19431)->first();
                if ($b1p6->evidencia != null and isset($b1p6)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p6->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $bypassAguaFiltrada = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $bypassAguaFiltrada = '';
            }
                $b1p7 = $consulta->where('idpregunta', '=', 19432)->first();
                if ($b1p7->evidencia != null and isset($b1p7)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p7->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $bypassAguaProducto = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $bypassAguaProducto = '';
            }
                $b1p8 = $consulta->where('idpregunta', '=', 19433)->first();
                if ($b1p8->evidencia != null and isset($b1p8)) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b1p8->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $fotoPizarra = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }else{
                $fotoPizarra = '';
            }



                   //Bloque 2
                 $b2p1 = $consulta->where('idpregunta', '=', 19321)->first();
                if ( isset($b2p1) and $b2p1->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p1->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $multimediaAg = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $multimediaAg = '';
                }
                $b2p2 = $consulta->where('idpregunta', '=', 19322)->first();
                if ( isset($b2p2) and $b2p2->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p2->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $carbonActivado = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $carbonActivado = '';
                }
                $b2p3 = $consulta->where('idpregunta', '=', 19323)->first();
                if ( isset($b2p3) and $b2p3->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p3->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $resina = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $resina = '';
                }
        //8
                $b2p5 = $consulta->where('idpregunta', '=', 19434)->first();
                if ( isset($b2p5) and $b2p5->evidencia != null ) {
                $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b2p5->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $nivelSalInicial = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $nivelSalInicial = '';
                }
                $b2p8 = $consulta->where('idpregunta', '=', 19841)->first();
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



           $b3p8 = $consulta->where('idpregunta', '=', 19347)->first();
           if (isset($b3p8) and $b3p8->evidencia != null) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p8->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $tdsAguaCruda = 'data:image/' . $type . ';base64,' . base64_encode($data);

           }else{
                 $tdsAguaCruda = '';
                }

           $b3p17 = $consulta->where('idpregunta', '=', 19346)->first();
           if (isset($b3p17) and $b3p17->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p17->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $tds = 'data:image/' . $type . ';base64,' . base64_encode($data);
           }else{
            $tds = '';
           }

           $b3p27 = $consulta->where('idpregunta', '=', 19356)->first();
           if (isset($b3p27) and $b3p27->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p27->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $tdsAguaProducto = 'data:image/' . $type . ';base64,' . base64_encode($data);
           }else{
                $tdsAguaProducto = '';
           }
           $b3p30 = $consulta->where('idpregunta', '=', 19392)->first();
           if (isset($b3p30) and $b3p30->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p30->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $produccionMembrana = "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p30->evidencia;
           }else{
                $produccionMembrana = '';
           }
            $b3p34 = $consulta->where('idpregunta', '=', 19359)->first();
           if (isset($b3p34) and $b3p34->evidencia != null ) {
           $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p34->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $moduloContador = "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b3p34->evidencia;
           }else{
                $moduloContador = '';
           }



       //4

            $b4p1 = $consulta->where('idpregunta', '=', 19360)->first();
                if (isset($b4p1) and $b4p1->evidencia != null ) {
                        $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p1->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $funcionaBomba = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    }else{

                        $funcionaBomba = '';
                    }
            $b4p2 = $consulta->where('idpregunta', '=', 19361)->first();
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

               $b4p3 = $consulta->where('idpregunta', '=', 19362)->first();
               if (isset($b4p3) and $b4p3->evidencia != null ) {
                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p3->evidencia;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $funcionaManometro = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{

                    $funcionaManometro = '';
                }


                $b4p4 = $consulta->where('idpregunta', '=', 19363)->first();
                if (isset($b4p4) and $b4p4->evidencia != null ) {
                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p4->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $tanquePrecargado = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $tanquePrecargado = '';
                }
                $b4p5 = $consulta->where('idpregunta', '=', 19364)->first();
                if (isset($b4p5) and $b4p5->evidencia != null ) {
                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b4p5->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $proteccionBomba = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }else{
                    $proteccionBomba = '';
                }


                $b5p29 = $consulta->where('idpregunta', '=', 19379)->first();
                if (isset($b5p29) and $b5p29->evidencia != null ) {
                     $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b5p29->evidencia;
                 $type = pathinfo($path, PATHINFO_EXTENSION);
                 $data = file_get_contents($path);
                 $filtroLimpio = 'data:image/' . $type . ';base64,' . base64_encode($data);
                 }else{

                     $filtroLimpio = '';
                 }


                 $b5p30 = $consulta->where('idpregunta', '=', 19371)->first();
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

                $b8p4 = $consulta->where('idpregunta', '=', 19378)->first();
                if (isset($b8p4) and $b8p4->evidencia != null ) {

                    $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$b8p4->evidencia;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $evidenciaFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);

                }else{
                    $evidenciaFinal = '';
                }




                //Acciones

         $bap3 = $consulta->where('idpregunta', '=', 19374)->first();
         if(isset($bap3) and $bap3->evidencia != null ){
         $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$bap3->evidencia;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $pizarraFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
         }else{
            $pizarraFinal = 'data:image/' . $type . ';base64,' . base64_encode($data);
         }
         $bap4 = $consulta->where('idpregunta', '=', 19389)->first();
         if (isset($bap4) and $bap4->evidencia != null ) {
		 $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$bap4->evidencia;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $reporteFinalSello = 'data:image/' . $type . ';base64,' . base64_encode($data);
		 }else{
		 $reporteFinalSello = '';
		 }


         $bap5 = $consulta->where('idpregunta', '=', 19393)->first();
		 if (isset($bap5) and $bap5->evidencia != null ) {
         $path =  "https://fotos.sumapp.cloud/Sumapp/Multiserle/".$bap5->evidencia;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $consumibleSello = 'data:image/' . $type . ';base64,' . base64_encode($data);
		 }else{
			 $consumibleSello = '';
		 }

         $bap7 = $consulta->where('idpregunta', '=', 19437)->first();
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
