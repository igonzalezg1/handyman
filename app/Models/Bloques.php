<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloques extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'tb_encuesta_bloque';

    protected $fillable = ['id_encuesta','n_orden_bloque','c_nombre_bloque','respuesta_predetermindada','valor','numero','d_borrado_bloque','ticket'];

    protected $primaryKey = 'id_bloque';
}
