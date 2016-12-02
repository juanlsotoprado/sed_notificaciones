<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use App\Models\Users\InternalUsersModel;
use Illuminate\Http\Request;

class AdminJsonController extends Controller {

    /**
     * Show si va
     * the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __construct() {

        $this->middleware('Json');
        $this->params = array();
    }

    public function get_usuario(Request $request) {

        $ldap_funcionario = new Common();

        $param_ldap = $ldap_funcionario->Buscar_usuario_ldap($request->all());

        if ($param_ldap) {
            $this->params['casos']['data'] = $param_ldap;

            $internal_user = new InternalUsersModel();
            $param_sitem = $internal_user->existingUser($param_ldap['numcedula']);

            if ($param_sitem) {

                $this->params['casos']['sistema'] = $param_sitem;
            } else {

                $this->params['casos']['sistema'] = 'false';
            }
        } else {

            $this->params['casos'] = 'ldap';
        }

        // error_log(print_r($this->params, true));
        //  dd($request->all());

        return response()->json($this->params);
    }

    public function get_perfiles(Request $request) {

        $internal_user = new InternalUsersModel();
        $this->params['casos'] = $internal_user->get_perfiles();

        //  dd($request->all());

        return response()->json($this->params);
    }

    public function registrar_modificar_funcionario(Request $request) {

        $internal_user = new InternalUsersModel();
        $this->params['casos'] = $internal_user->registrar_modificar_funcionario($request->all());

        //  dd($request->all());

        return response()->json($this->params);
    }

    public function set_estatus(Request $request) {

        $internal_user = new InternalUsersModel();
        $this->params['casos'] = $internal_user->set_estatus($request->all());

        //  dd($request->all());

        return response()->json($request->all());
    }

}
