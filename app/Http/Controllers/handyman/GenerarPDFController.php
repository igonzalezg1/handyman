<?php

namespace App\Http\Controllers\handyman;

use App\Http\Controllers\Controller;
use App\Models\PreguntasModel;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class GenerarPDFController extends Controller
{
    public function generarPDF()
    {
        $bloques = [1431, 1432, 1433, 1434, 1435, 1436, 1437, 1438];
        $carpeta = "https://fotos.sumapp.cloud/Sumapp/MultiserleHandyman/";
        $preguntas = $this->obtenerPreguntas();
        for ($i = 0; $i < 8; $i++) {
            $respuestas[$i] = $this->obtenerRespuestas($preguntas[$i], $bloques[$i]);
        }


        foreach ($respuestas[1] as $respuesta) {
            foreach ($preguntas[1] as $pregunta) {
                $preguntax = $pregunta['id_pregunta'];
                if (!$respuesta->$preguntax == '') {
                    $path = $carpeta . $respuesta->$preguntax;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $respuesta->$preguntax = 'data:image/' . $type . ';base64,' . base64_encode($data);
                } else {
                    $respuesta->$preguntax = '';
                }

            }
        }
        //$dompdf = new Dompdf();
        //$dompdf->loadhtml(view('handyman.reportepdf.imagenes',compact('carpeta','preguntas','respuestas')));
        //$dompdf->setPaper('A4', 'landscape');
        //$dompdf->render();
        //$dompdf->stream();
        return view('handyman.reportepdf.imagenes', compact('carpeta', 'preguntas', 'respuestas'));
    }

    public function obtenerPreguntas()
    {
        $bloque1431 = PreguntasModel::where('id_bloque', 1431)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();
        $bloque1432 = PreguntasModel::where('id_bloque', 1432)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();
        $bloque1433 = PreguntasModel::where('id_bloque', 1433)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();
        $bloque1434 = PreguntasModel::where('id_bloque', 1434)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();
        $bloque1435 = PreguntasModel::where('id_bloque', 1435)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();
        $bloque1436 = PreguntasModel::where('id_bloque', 1436)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();
        $bloque1437 = PreguntasModel::where('id_bloque', 1437)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();
        $bloque1438 = PreguntasModel::where('id_bloque', 1438)->where('c_tipo_pregunta', 'Evidencia')->get()->toArray();

        $bloques = [$bloque1431, $bloque1432, $bloque1433, $bloque1434, $bloque1435, $bloque1436, $bloque1437, $bloque1438];
        return $bloques;
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
        foreach ($consulta as $fila) {
            array_push($regreso, $fila);
        }

        return $regreso;
    }
}
