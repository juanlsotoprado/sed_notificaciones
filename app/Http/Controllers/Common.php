<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Users\InternalUsersModel;
use Illuminate\Support\Facades\Session;
use SoapClient;
use SoapVar;
use SoapParam;

class Common extends Controller {

    //

    public function Buscar_usuario_ldap($params) {

        try {

            $params = array('filtros' => array('usuario' => $params['funcionario']));
            $clientOptions = array();
            $wsdl = "http://webservices.mppeuct.gob.ve/ldap/ldap.wsdl";
            $client = new SoapClient($wsdl, $clientOptions);
            $soapstruct = new SoapVar($params, SOAP_ENC_OBJECT, "params", "http://webservices.mppeuct.gob.ve/ldap/schema.xsd");
            $objeto = $client->consultarDatosPersonalesLdap(new SoapParam($soapstruct, "message"));

            if ($objeto['respuesta']) {

                return $objeto['respuesta'];
            } else {

                return false;
            }
        } catch (SoapFault $exp) {

            return false;
        }
    }

}














