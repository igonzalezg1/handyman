<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralesController extends Controller
{
    public function index(Request $request){

        $sucursal= $request->sucursal;

        

        $datos = DB::select("SELECT * FROM	tb_respuesta WHERE usuario like ? and respuesta like ? ", ['multiserle%', '%'.$sucursal.'%']);


        return view('generales.index', compact('datos'));
    }

  

}
