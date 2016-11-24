<?php

namespace App\Models\Sesion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class SesionModel extends Model {

    public function SetSesion($params) {

        Session::put('user', $params['user']);
        Session::put('numcedula', $params['numcedula']);
        Session::put('nombre', $params['nombre']);
        Session::put('correo', $params['correo']);
        Session::put('oficina', $params['oficina']);
        Session::put('id_usuario', $params['user_internal']['id_usuario']);
        Session::put('id_perfil', $params['user_internal']['id_perfil']);
        Session::put('nombre_perfil', $params['user_internal']['nombre_perfil']);
    }
    
     public function SetSesionPerfil($params) {
         
         Session::put('id_perfil', $params['user_internal']['id_perfil']);
         Session::put('nombre_perfil', $params['user_internal']['nombre_perfil']);
    }

    public function Cerrar_sesion() {

        Session::flush();
    }

}
