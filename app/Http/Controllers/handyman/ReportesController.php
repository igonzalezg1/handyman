<?php

namespace App\Http\Controllers\handyman;

use App\Http\Controllers\Controller;
use App\Models\Bloques;
use App\Models\PreguntasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function index()
    {
        return view('handyman.index');
    }

    public function verreportes($idBloque)
    {
        $bloque = Bloques::select('c_nombre_bloque')->where('id_bloque', $idBloque)->first();
        $carpeta = "MultiserleHandyman";
        $preguntas = $this->obtenerPreguntas($idBloque);
        $respuestas = $this->obtenerRespuestas($preguntas,$idBloque);
        return view('handyman.reportes', compact('preguntas','respuestas','carpeta','bloque'));
    }

    public function obtenerPreguntas($idBloque)
    {
        $preguntas = PreguntasModel::where('id_bloque', $idBloque)->get()->toArray();
        $regreso = [];
        foreach ($preguntas as $pregunta) {
            array_push($regreso, $pregunta);
        }
        return $regreso;
    }

    public function obtenerRespuestas(array $preguntas, $idBloque)
    {
        $consulta = "SELECT ";
        foreach ($preguntas as $pregunta) {
            if ($pregunta['c_tipo_pregunta'] == 'Evidencia') {
                $consulta .= "MAX(CASE WHEN idpregunta='" . $pregunta['id_pregunta'] . "' THEN evidencia ELSE NULL END) as '" . $pregunta['id_pregunta'] . "', ";
            } else {
                $consulta .= "MAX(CASE WHEN idpregunta='" . $pregunta['id_pregunta'] . "' THEN respuesta ELSE NULL END) as '" . $pregunta['id_pregunta'] . "', ";
            }
        }
        $consulta .= "clave_registro as id_respuesta,
              SUBSTR(fecha,1,10) AS fecha_registro, latitud, longitud, s.sucursal FROM tb_respuesta r JOIN tb_sucursal s ON s.id_sucursal = r.sucursal WHERE idbloque='$idBloque' AND usuario LIKE '%handyman%' GROUP BY clave_registro ORDER BY SUBSTR(fecha,1,10) DESC";

        $consulta = DB::connection('mysql2')->select($consulta);
        $regreso = [];
        foreach ($consulta as $fila)
        {
            array_push($regreso, $fila);
        }

        return $regreso;
    }
}
