<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\Sesion\SesionModel;
use App\Models\Users\InternalUsersModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use SoapClient;
use SoapVar;
use SoapParam;

class LoginController extends Controller {

    /**
     * Show si va
     * the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Cerrar_Sesion() {

        Session::flush();
        return redirect('/');
    }

    public function Validar_Ususario(Request $request) {
        $sesion_sistem = new SesionModel();

        $usser = $request->input('usuario');
        $pass = $request->input('password');

        //aqui se selecciona el tipo de validacion que se quiere
        $respuesta = $this->ldap($usser, $pass);

        if ($respuesta != 0) {

            $internal_user = new InternalUsersModel();
            $params = $internal_user->existingUser($respuesta['numcedula']);

            if ($params) {

                $respuesta['user'] = $usser;
                $respuesta['user_internal'] = $params;

                $sesion_sistem->SetSesion($respuesta);
            }
        }

        if (!Session::has('user')) {

            Session::put('error', true);
        }

        return redirect('/');
    }

    private function ldap($user, $pass) {

        ini_set("soap.wsdl_cache_enabled", "0");
        try {

            $params = array('usuario' => $user, 'clave' => $pass);
            $client = new SoapClient("http://webservices.mppeuct.gob.ve/ldap/ldap.wsdl", array());
            $soapstruct = new SoapVar($params, SOAP_ENC_OBJECT, "params", "http://webservices.mppeuct.gob.ve/ldap/schema.xsd");
            $objeto = $client->consultarLdap(new SoapParam($soapstruct, "message"));

            if ($objeto != 0) {

                return $objeto;
            } else {
                error_log("clave o usuario invalido / usuario inactivo ldap");
                $_SESSION['error'] = true;
                return FALSE;
            }
        } catch (SoapFault $exp) {
            error_log(print_r($exp->getMessage()));
        }
    }

    public function VerificarPerfil() {
        $sesion_sistem = new SesionModel();

        $internal_user = new InternalUsersModel();
        $params = $internal_user->existingUser(Session::get('numcedula'));

        if ($params) {

            $respuesta['user_internal'] = $params;
            $sesion_sistem->SetSesionPerfil($respuesta);
            return true;
        } else {

            return false;
        }
    }

}
