<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

    /**
     * Generated
     */

    protected $table = 'perfil';
    protected $fillable = ['id', 'descripcion', 'fecha'];


    public function usuario_id_perfil_fkey() {
        return $this->hasMany(\App\Models\Usuario::class, 'id_perfil', 'id');
    }


}
