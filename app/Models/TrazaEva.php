<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrazaEva extends Model {

    /**
     * Generated
     */

    protected $table = 'traza_eva';
    protected $fillable = ['fecha', 'estatus', 'id_usuario', 'anno', 'fecha_registro', 'id', 'periodo', 'id_evaluacion'];


    public function evaluacion_id_usuario_fkey() {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario', 'id');
    }


}
