<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBUsuario extends Model
{
    use HasFactory;

    /**
     * Conexión a utilizar
     *
     * @var string
     */
    protected $connection = 'mysql2';

    /**
     * Nombre de la tabla a utilizar.
     *
     * @var string
     */
    protected $table = 'tb_usuario';

    /**
     * Llave primaria a utilizar.
     *
     * @var string
     */
    protected $primaryKey = 'id_usuario';


    /**
     * Deshabilitar timestamps de laravel
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * Atributos
     *
     * @var array<string>
     */
    protected $appends = [
        'nombre_completo'
    ];

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->apellido}";
    }
}
