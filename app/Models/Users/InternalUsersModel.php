<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use DB;

class InternalUsersModel extends Model {

    public function existingUser($cedula) {

        $users = DB::table('usuario')
                ->join('perfil', 'usuario.id_perfil', '=', 'perfil.id')
                ->select('usuario.*', 'perfil.descripcion')
                ->where('usuario.estatus', '=', true)
                ->where('usuario.cedula', '=', $cedula)
                ->get();

        if (!sizeof($users) == 0) {

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

        return false;
    }

    public function Buscar_usuario_sistem() {

        $users = DB::table('usuario')
                ->join('perfil', 'usuario.id_perfil', '=', 'perfil.id')
                ->select('usuario.*', 'perfil.descripcion')
                ->orderBy('usuario.id', 'DESC')
                ->get();
                
        if (!sizeof($users) == 0) {

            return $users;
        }

        return false;
    }

    public function get_perfiles() {

        $perfiles = DB::table('perfil')
                ->select('*')
                ->orderBy('id', 'DESC')
                ->get();

        if (!sizeof($perfiles) == 0) {

            return $perfiles;
        }

        return false;
    }

    public function registrar_modificar_funcionario($data) {


        DB::beginTransaction();

        try {

            $accion = !empty($data['modificar']) ? 'modificar' : 'registrar';

            if (!empty($data['modificar'])) {

                $id_perfil = $data['perfil']['id'];

                DB::update('update usuario set id_perfil = ' . $id_perfil . ', fecha =  now()  where cedula = ?', [$data['numcedula']]);
            } else {

                DB::insert('insert into usuario (cedula, estatus,fecha,id_perfil,nombre_apellido) values (?,?,?,?,?)', [ $data['numcedula'], true, 'now()', $data['perfil']['id'], $data['nombreApellido']]);
            }

            DB::commit();

            return true;
        } catch (\Exception $exc) {
            error_log($exc, 0);
            DB::rollback();
            return false;
        }
    }

    public function set_estatus($data) {

        DB::beginTransaction();

        try {
            $estatus = $data["estatus"];
            DB::update('update usuario set estatus = ' . $estatus . ', fecha =  now()  where cedula = ?', [$data['cedula']]);

            DB::commit();

            return true;
        } catch (\Exception $exc) {
            error_log($exc, 0);
            DB::rollback();
            return false;
        }

        return true;
    }

}
