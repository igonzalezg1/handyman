<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as HttpClient;
use Illuminate\Support\Facades\Validator;

class ReporteTiemposController extends Controller
{
    /**
     * Constructor
     */
    public $api, $id_empresa;
    public function __construct()
    {
        $this->id_empresa = 14;
        $this->api = config('app.api.dashboard_corporativo');
    }

    /**
     * Retorna el reporte de tiempos a nivel empresa
     *
     * @return CollectionObject $reporte_tiempos
     */
    public function empresa()
    {
        $data = HttpClient::get("{$this->api}/tiempos-visita/promedio/empresa", [
            'id_empresa' => $this->id_empresa
        ]);

        if ($data->failed()) {
            return abort(500);
        }

        $data = collect($data->object());
        return view('app.reporte-tiempos.empresa', compact(
            'data'
        ));
    }

    /**
     * Retorna el reporte de tiempos a nivel usuario [individual]
     *
     * @return CollectionObject $reporte_tiempos
     */
    public function individual(Request $request, $id_usuario)
    {
        $validator = Validator::make(['id_usuario' => $id_usuario], [
            'id_usuario' => ['required', 'integer', new Rules\UserOfThisApp],
        ]);

        if ($validator->fails()) {
            return abort(404);
        }

        $data = HttpClient::get("{$this->api}/tiempos-visita/individual", [
            'id_usuario' => $id_usuario
        ]);

        if ($data->failed()) {
            return abort(500);
        }

        $data = collect($data->object());
        return view('app.reporte-tiempos.individual', compact(
            'data',
            'request'
        ));
    }
}
