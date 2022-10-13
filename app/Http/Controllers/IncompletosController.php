<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncompletosController extends Controller
{
    public function index(){


        $datos = DB::connection('mysql2')->select("SELECT * FROM	visitasincompletas WHERE visita like ?  ", ['%multiserle%']);

            return view('incompletos.index', compact('datos'));

    }
}
