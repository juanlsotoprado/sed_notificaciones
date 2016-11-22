<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use DB;

class InternalUsersModel extends Model {

    public function existingUser($cedula) {

        $users = DB::table('usuario')
                ->join('perfil', 'usuario.id_perfil', '=', 'perfil.id')
                ->select('usuario.*', 'perfil.descripcion')
                ->where('cedula', '=', $cedula)
                ->get();

        if ($users) {

            foreach ($users as $user) {

                $params['id_usuario'] = $user->id;
                $params['cedula'] = $user->cedula;
                $params['estatus'] = $user->estatus;
                $params['fecha'] = $user->fecha;
                $params['id_perfil'] = $user->id_perfil;
                $params['nombre_apellido'] = $user->nombre_apellido;
                $params['nombre_perfil'] = $user->descripcion;
                
            }

            return $params;
        }

        //   error_log(print_r($params, true));

        return false;
    }

}
