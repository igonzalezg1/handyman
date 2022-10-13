<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idSucursal = Auth::user()->id_sucursal;
        $email = Auth::user()->email;
        $sucursal = DB::select('SELECT sucursal FROM tb_sucursal WHERE id_sucursal = ?', [$idSucursal]);
       
            // $invoices = DB::connection('mysql2')->table('tb_usuario')->get();
        $idSucursal = DB::connection('mysql2')->select('SELECT id_empresa, id_sucursal, tipo_cuenta FROM tb_usuario WHERE correo = ?', [$email]);
        $sucursal = DB::select('SELECT sucursal FROM tb_sucursal WHERE id_sucursal = ?', [$idSucursal[0]->id_sucursal]);
        $empresa = DB::connection('mysql2')->select('SELECT c_nombre_empresa FROM tb_empresa WHERE id_empresa = ?', [$idSucursal[0]->id_empresa]);
        $tipoUsuario = $idSucursal[0]->tipo_cuenta;
   
          
           
          
   
           if ($tipoUsuario == 'supervisor') {
             
             $tickets = DB::table('tickets')
                     ->where('empresa', '=', $empresa[0]->c_nombre_empresa)
                     ->get();
                
           }else{
             $tickets = DB::table('tickets')
             ->where('sucursal', '=', $sucursal[0]->sucursal)
             ->get();
           }
                 
      


        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idSucursal = Auth::user()->id_sucursal;
        $idEmpresa = Auth::user()->id_empresa;
        $sucursal = DB::select('SELECT sucursal FROM tb_sucursal WHERE id_sucursal = ?', [$idSucursal]);
        $empresa= DB::select('SELECT c_nombre_empresa FROM tb_empresa WHERE id_empresa = ?', [$idEmpresa]);
        $empresa = $empresa[0]->c_nombre_empresa;
        $sucursal = $sucursal[0]->sucursal;
        $areas = DB::table('controlareas')
        ->join('areas', 'controlareas.idArea', '=', 'areas.id')
        ->select('areas.area_descripcion')
        ->where('controlareas.idSucursal', '=', $idSucursal)
        ->get();
        $categorias = DB::table('tcs_control_categorias')
        ->join('tcs_categorias', 'tcs_control_categorias.idCategoria', '=', 'tcs_categorias.id')
        ->select('tcs_categorias.id', 'tcs_categorias.categoria_descripcion')
        ->where('tcs_control_categorias.idEmpresa', '=', $idEmpresa)
        ->get();

        return view('tickets.create', compact('areas','categorias', 'empresa','sucursal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request;
     
    
        $ftp_server = "162.248.54.103";
        $ftp_user_name = "corozco";
        $ftp_user_pass = "themaster1996";
        $ftp_port = "21";
        $destination_file = "/fotostickets.sumapp.cloud/$request->empresa";
        $fileIden = $request->file('evidencia');
        $iden = time().$fileIden->getClientOriginalName();
        

        // set up basic connection
        $conn_id = ftp_connect($ftp_server,$ftp_port);

        // login with username and password
        ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
        // ftp passive cmd
        ftp_pasv($conn_id, true);

        ftp_put($conn_id, $destination_file.'/'.$iden, $fileIden, FTP_BINARY);

      

    
        $fechaCreacion = date('m-d-Y h:i:s a', time());  

        $categoria = DB::table('tcs_categorias')
                        ->where('id', '=', $request->categoria)
                        ->get();
       

        DB::table('tickets')->insert([
            'empresa' => $request->empresa,
            'sucursal' => $request->sucursal,
            'area' => $request->area,
            'categoria' => $categoria[0]->categoria_descripcion,
            'subcategoria' => $request->subcategoria,
            'ticket_descripcion' => $request->descripcion,
            'observaciones' => $request->observaciones,
            'accion' => $request->accion,
            'estatus' => 'Abierto',
            'created_at' => $fechaCreacion,
            'updated_at' => $fechaCreacion,
            'evidenciaInicial' => $iden

        ]);
     
       





        return redirect('/tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $idSucursal = Auth::user()->id_sucursal;
        $email = Auth::user()->email;
        $sucursal = DB::select('SELECT sucursal FROM tb_sucursal WHERE id_sucursal = ?', [$idSucursal]);
       
            // $invoices = DB::connection('mysql2')->table('tb_usuario')->get();
        $idSucursal = DB::connection('mysql2')->select('SELECT id_empresa, id_sucursal, tipo_cuenta FROM tb_usuario WHERE correo = ?', [$email]);
        $sucursal = DB::select('SELECT sucursal FROM tb_sucursal WHERE id_sucursal = ?', [$idSucursal[0]->id_sucursal]);
        $empresa = DB::connection('mysql2')->select('SELECT c_nombre_empresa FROM tb_empresa WHERE id_empresa = ?', [$idSucursal[0]->id_empresa]);
        $tipoUsuario = $idSucursal[0]->tipo_cuenta;
   
          
        $tickets = DB::select('SELECT * FROM tickets WHERE id = ?', [$id]);


        return view('tickets.edit', compact('tickets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fechaCreacion = date('m-d-Y h:i:s a', time());  

        DB::table('tickets')
        ->where('id', $id)
        ->update([
            
            'ticket_descripcion' => $request->descripcion,
            'observaciones' => $request->observaciones,
            'costo' => $request->costo,
            'estatus' => $request->estatus,
            'updated_at' => $fechaCreacion
        ]);

        return redirect('/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subcategoria(Request $request){

        $categoria = $_POST['cat'];
        $idEmpresa = 17;

        $subcategorias = DB::table('tcs_subcategorias')
        ->select('descripcion_subcategoria')
        ->where('idCategoria', '=', $categoria)
        ->get();

        return view('tickets.subcategorias', compact('subcategorias'));

    }
}
