<?php

namespace App\Http\Controllers;

use App\Models\Igualas;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IgualasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


       return view('igualas.index');
    }
    public function historico(){




       return view('igualas.historico');
    }
    public function consulta(Request $request){

        $datos = DB::table('tickets')
            ->join('igualas_multiserle', 'tickets.cc', '=', 'igualas_multiserle.cc')
            ->select('igualas_multiserle.*', 'tickets.*')
            ->get();

       // $datos = Igualas::get();
       return  response()->json($datos);
       // $data = json_encode($data);

      //  return view('igualas.index', compact('datos'));
    }
    public function consultah(Request $request){

        $datos = DB::table('igualas_multiserle_r')->get();


       return  response()->json($datos);
       // $data = json_encode($data);

      //  return view('igualas.index', compact('datos'));
    }
    public function igualassave(Request $request){

        $cc = $_POST['cc'];
        $lampara = $_POST['lampara'];
        $top = $_POST['top'];
        $incidente = $_POST['incidente'];
        $fecha_cierre = $_POST['fecha_cierre'];
        $oc = $_POST['oc'];
        $factura = $_POST['factura'];
        $ingreso = $_POST['ingreso'];
        $costo = $_POST['costo'];


        DB::table('igualas_multiserle')
               ->where('cc', $cc)
                ->update([
                    'top' => $top,
                    'lampara' => $lampara,
                    'incidente' => $incidente,
                    'fecha_cierre' => $fecha_cierre,
                    'oc' => $oc,
                    'factura' => $factura,
                    'ingreso' => $ingreso,
                    'costo' => $costo,
                ]);


       // $data = json_encode($data);

      //  return view('igualas.index', compact('datos'));
    }

    public function actualiza(){
        $sucursales = DB::table('igualas_multiserle')
                    ->select('cc')
                    ->get();

        foreach ($sucursales as $sucursal) {

        if ($sucursal->cc == '38345'  ) {
        continue;
        # code...
        }

       echo $csucursal = '%| '.$sucursal->cc;
      // echo $csucursal = '%| 38449';

         echo '</br>';
        # code...

        $fechas = DB::connection('mysql2')->select("SELECT * FROM tb_respuesta WHERE respuesta LIKE ? AND usuario LIKE ? ORDER BY idrespuesta DESC LIMIT 3", ['%'.$sucursal->cc.'%', 'multiserle%']);
         if (isset($fechas[0]->fecha)) {
            $fechas1 = formato_fecha($fechas[0]->fecha);
         }else{
            $fechas1 = 'S/D';
         }
         if (isset($fechas[1]->fecha)) {
            $fechas2 = formato_fecha($fechas[1]->fecha);
         }else{
            $fechas2 = 'S/D';
         }
         if (isset($fechas[2]->fecha)) {
            $fechas3 = formato_fecha($fechas[2]->fecha);
         }else{
            $fechas3 = 'S/D';
         }
;
        //return  $datos = DB::connection('mysql2')->select("SELECT * FROM	tb_respuesta WHERE usuario like ? and respuesta like ? ", ['multiserle%', '%'.$sucursal.'%']);

        $data = DB::connection('mysql2')->table('tb_respuesta')
            ->where('usuario', '!=', 'pruebamultiserle@correo.com')
            ->where('respuesta', 'like', $csucursal)
            ->orderBy('idrespuesta', 'desc')
            ->first();

        if (!isset($data->no_visita)) {
            return 'no existe';
        }

        $no_visita = $data->no_visita;
        $fecha = $data->fecha;
        $fecha = substr($fecha, 0, 10);

        $data = DB::connection('mysql2')->table('tb_respuesta')
            ->join('tb_encuesta_pregunta', 'tb_respuesta.idpregunta', '=', 'tb_encuesta_pregunta.id_pregunta')
            ->where('fecha', 'like', $fecha.'%')
            ->where('no_visita', $no_visita)
            ->get();

        $dias_lampara = $data->where('c_titulo_pregunta', 'Lampara UV dias de vida util. Minimo 30')->first();
        $tds = $data->where('c_titulo_pregunta', 'TDS (PPM) 70 - 200')->first();
        $membrana = $data->where('c_titulo_pregunta', 'Produccion de membranas  >750ml/min')->first();
        //numero de días de la lampara

        if (!isset($data->no_visita) or $dias_lampara->respuesta == '' or $dias_lampara->respuesta == null or $tds->respuesta == '' or $membrana->respuesta == '') {
            continue;
        }
            $dias_lampara = $dias_lampara->respuesta;

            //numero de días despues de la fecha
            $fecha2 = date("Y-m-d");
            $firstDate  = new DateTime($fecha);
            $secondDate = new DateTime($fecha2);
            $intvl = $firstDate->diff($secondDate);

            //dias de la lampara menos la diferencia al día de hoy
           echo $dias_lampara -=  $intvl->days;
            echo '</br>';

            DB::table('igualas_multiserle')
            ->where('cc', $sucursal->cc)
            ->update(['dias' => $dias_lampara]);
            DB::table('igualas_multiserle')
            ->where('cc', $sucursal->cc)
            ->update(['tds' => $tds->respuesta]);
            DB::table('igualas_multiserle')
            ->where('cc', $sucursal->cc)
            ->update(['membrana' => $membrana->respuesta]);
            DB::table('igualas_multiserle')
            ->where('cc', $sucursal->cc)
            ->update(['fecha1' => $fechas1,
                      'fecha2' => $fechas2,
                      'fecha3' => $fechas3,
                    ]);

            }
    }

    public function respaldo(Request $request){

       // return $request;
        $query = DB::table('igualas_multiserle')->get();
        $fecha = formato_fecha($request->fecha);
        //$fecha = date('d-m-Y');


      foreach ($query as $a) {

        DB::table('igualas_multiserle_r')->insert([

            'zona' => $a->zona,
            'ciudad' => $a->ciudad,
            'top' => $a->top,
            'marca' => $a->marca,
            'cc' => $a->cc,
            'sucursal' => $a->sucursal,
            'lampara' => $a->lampara,
            'dias' => $a->dias,
            'tds' => $a->tds,
            'membrana' => $a->membrana,
            'fecha1' => $a->fecha1,
            'fecha2' => $a->fecha2,
            'fecha3' => $a->fecha3,
            'incidente' => $a->incidente,
            'fecha_cierre' => $a->fecha_cierre,
            'oc' => $a->oc,
            'factura' => $a->factura,
            'ingreso' => $a->ingreso,
            'costo' => $a->costo,
            'fecha_respaldo' => $fecha

        ]);

        DB::table('igualas_multiserle')->update([
            'incidente' => null,
            'fecha_cierre' => null,
            'oc' => null,
            'factura' => null,
            'ingreso' => null,
            'costo' => null,
        ]);
      }


      return redirect('igualas')->with('status', '¡Respaldo generado!');

    }
}
