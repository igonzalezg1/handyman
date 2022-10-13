<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntasModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'tb_encuesta_pregunta';

    protected $fillable = ['id_encuesta', 'id_bloque', 'c_tipo_pregunta','n_orden_pregunta', 'c_titulo_pregunta', 'clave_pregunta', 'valor', 'no_aplica', 'requerido','min','max'];

    protected $primaryKey = 'id_pregunta';

    public $timestamps = false;
}
