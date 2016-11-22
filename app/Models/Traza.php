<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traza extends Model {

    /**
     * Generated
     */

    protected $table = 'trazas';
    protected $fillable = ['id', 'id_usuario', 'fecha', 'semestre', 'anno', 'cedula', 'nombre_completo', 'puntuacion', 'rango', 'fecha_registro'];


    public function mensaje_enviados_traza_id_usuario_fkey() {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario', 'id');
    }


}
