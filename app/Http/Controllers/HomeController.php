<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


      //  $data = json_encode($data);
      // return $invoices = DB::connection('mysql2')->table('users')->get();
        $email = Auth::user()->email;



       // $invoices = DB::connection('mysql2')->table('tb_usuario')->get();
         $idSucursal = DB::connection('mysql2')->select('SELECT id_empresa, id_sucursal, tipo_cuenta FROM tb_usuario WHERE correo = ?', [$email]);
         $sucursal = DB::select('SELECT sucursal FROM tb_sucursal WHERE id_sucursal = ?', [$idSucursal[0]->id_sucursal]);
         $empresa = DB::connection('mysql2')->select('SELECT c_nombre_empresa FROM tb_empresa WHERE id_empresa = ?', [$idSucursal[0]->id_empresa]);
         $tipoUsuario = $idSucursal[0]->tipo_cuenta;





        if ($tipoUsuario == 'supervisor') {

          $tickets = DB::table('tickets')
                  ->where('empresa', '=', 'Multiserle')
                  ->get();

          //NORTE
          $norte = DB::table('sucursales_m')
                  ->where('zona', 'NORTE')
                  ->where('marca', 'STBX')
                  ->count();
          $norteCheck = DB::table('sucursales_m')
                  ->where('zona', 'NORTE')
                  ->where('marca', 'STBX')
                  ->where('check_mensual', '1')
                  ->count();
          $porcentajeNorte =  round(($norteCheck / $norte) * 100);
          //BAJIO
          $bajio = DB::table('sucursales_m')
                  ->where('zona', 'BAJIO')
                  ->where('marca', 'STBX')
                  ->count();
          $bajioCheck = DB::table('sucursales_m')
                  ->where('zona', 'BAJIO')
                  ->where('marca', 'STBX')
                  ->where('check_mensual', '1')
                  ->count();
          $porcentajeBajio =  round(($bajioCheck / $bajio) * 100);
          //OCCIDENTE
          $occidente = DB::table('sucursales_m')
                  ->where('zona', 'OCCIDENTE')
                  ->where('marca', 'STBX')
                  ->count();
          $occidenteCheck = DB::table('sucursales_m')
                  ->where('zona', 'OCCIDENTE')
                  ->where('marca', 'STBX')
                  ->where('check_mensual', '1')
                  ->count();
          $porcentajeOccidente =  round(($occidenteCheck / $occidente) * 100);

        }else{
          $tickets = DB::table('tickets')
          ->where('sucursal', '=', $sucursal[0]->sucursal)
          ->get();
        }


        $abiertos  = $tickets->where('estatus', '=', 'Abierto')->count();
        $procesos  = $tickets->where('estatus', '=', 'En proceso')->count();
        $cerrados  = $tickets->where('estatus', '=', 'Cerrado')->count();
        $preventivos  = $tickets->where('accion', '=', 'Preventivo')->count();
        $correctivos  = $tickets->where('accion', '=', 'Correctivo')->count();






        return view('home', compact('abiertos', 'procesos', 'cerrados', 'preventivos','correctivos',
         'porcentajeNorte', 'porcentajeBajio', 'porcentajeOccidente'));
    }

    public function avances(){

        if (isset($_POST['daterange'])) {
            $fechas = $_POST['daterange'];
            $cortes = explode(" - ", $fechas);
            list($diai, $mesi, $anioi) = explode("/", $cortes[0]);
            $fechaIni = $anioi . '-' . $mesi . '-' . $diai;
            list($diaf, $mesf, $aniof) = explode("/", $cortes[1]);
            $fechaFin = $aniof . '-' . $mesf . '-' . $diaf;

            $usuarios = DB::connection('mysql2')->select('SELECT correo, nombre, apellido  FROM tb_usuario WHERE id_empresa = ?', ['14']);
            $array = [];

                foreach ($usuarios as $usuario) {

                    $tecnico = DB::connection('mysql2')->select('SELECT count(distinct( no_visita ) ) AS visitas FROM tb_respuesta WHERE usuario = ? AND fecha BETWEEN ? AND ?', [$usuario->correo, $fechaIni, $fechaFin]);

                    if ($usuario->correo == 'pruebamultiserle@correo.com' or $usuario->correo == 'multiserle.ingenieria@gmail.com') {
                        continue;
                    }

                    array_push($array, [
                        'nombre' => $usuario->nombre . ' ' . $usuario->apellido,
                        'visitas' => $tecnico[0]->visitas

                    ]);
                }



            $datos = $array;

            return  response()->json($datos);

        }else{

        $usuarios = DB::connection('mysql2')->select('SELECT correo, nombre, apellido  FROM tb_usuario WHERE id_empresa = ? ', ['14']);

        $count = count($usuarios);
        $array = [];
        foreach ($usuarios as $usuario) {

                $tecnico = DB::connection('mysql2')->select('SELECT count(distinct( no_visita ) ) AS visitas FROM tb_respuesta WHERE usuario = ? AND fecha BETWEEN ? AND ?', [$usuario->correo, '2022-03-01', '2022-03-30']);

            if ($usuario->correo == 'pruebamultiserle@correo.com' or $usuario->correo == 'multiserle.ingenieria@gmail.com') {
                continue;
            }

            array_push($array, [
                'nombre' => $usuario->nombre.' '.$usuario->apellido,
                'visitas' => $tecnico[0]->visitas

            ]);
        }



        $datos = $array;

        return  response()->json($datos);
        }
    }
}
