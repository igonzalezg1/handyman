<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'tb_sucursal';

    protected $fillable = ['id_empresa','id_app','sucursal','habitaciones'];

    protected $primaryKey = 'id_sucursal';
}
