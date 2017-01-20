<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common;
use App\Models\Users\InternalUsersModel;
use App\Models\Evaluacion\EvaluacionModel;
use Illuminate\Http\Request;
use Spreadsheet_Excel_Reader;

class AppJsonController extends Controller {

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

    public function procesar_notificaciones(Request $request) {

        $fecha = date_create();

        $estatus = false;

        if ($request->hasFile('calc')) {


            $mime = $request->file('calc')->getMimeType();
            $extension = strtolower($request->file('calc')->getClientOriginalExtension());
            $fileName = "calc-" . date_timestamp_get($fecha) . "." . $extension;
            $path = "privado/docs/";

            switch ($mime) {
                case "application/vnd.ms-office":
                    if ($request->file('calc')->isValid()) {
                        if ($request->file('calc')->move($path, $fileName)) {

                            include(app_path() . '/Library/Excel/reader.php');

                            // ExcelFile($filename, $encoding);
                            $data = new Spreadsheet_Excel_Reader();
                            $data->setOutputEncoding('CP1251');
                            $data->read(public_path() . "/" . $path . $fileName);
                            $formatoCount = 0;

                            if (!empty($data->sheets[0]['cells'])) {

                                foreach ($data->sheets[0]['cells'] as $key => $value) {
                                    if ($key > 1) {

                                        if (empty($value[1]) && $formatoCount < 30) {

                                            $formato[$key . "-A"]['valor'] = '';
                                            $formato[$key . "-A"]['linea'] = $key . " - A";
                                            $formato[$key . "-A"]['error'] = "Campo vacio";
                                            $formatoCount++;
                                        } else {

                                            $temp_array[] = $value[1];
                                        }
                                    }
                                }

                                if ($formatoCount < 1) {
                                    $res = array_diff($temp_array, array_diff(array_unique($temp_array), array_diff_assoc($temp_array, array_unique($temp_array))));


                                    foreach (array_unique($res) as $k => $v) {

                                        $temp = "";
                                        foreach (array_keys($res, $v) as $value) {
                                            $temp .= ($value + 2) . "-A / ";
                                        }

                                        if ($formatoCount < 30) {

                                            $formato[$k . "duplicate"]['valor'] = $v;
                                            $formato[$k . "duplicate"]['linea'] = $temp;
                                            $formato[$k . "duplicate"]['error'] = "Campo repetido.";
                                            $formatoCount++;
                                        }
                                    }
                                }
                                foreach ($data->sheets[0]['cells'] as $key => $value) {

                                    if ($key > 1) {

                                        for ($i = 1; $i < 5; $i++) {
                                            $dataxls[$i] = empty($value[$i]) ? '' : utf8_encode($value[$i]);
                                        }

                                        $dataxls_final[] = $dataxls;

                                        if (!preg_match("/^[0-9]*$/", trim($dataxls[1])) && $formatoCount < 30) {

                                            $formato[$key . "-A"]['valor'] = $dataxls[1];
                                            $formato[$key . "-A"]['linea'] = $key . " - A";
                                            $formato[$key . "-A"]['error'] = "El campo debe ser numérico";
                                            $formatoCount++;
                                        }

                                        if ($dataxls[2] == '' && $formatoCount < 30) {

                                            $formato[$key . "-B"]['valor'] = $dataxls[2];
                                            $formato[$key . "-B"]['linea'] = $key . " - B";
                                            $formato[$key . "-B"]['error'] = "Campo vacio";
                                            $formatoCount++;
                                        }

                                        if ($dataxls[3] == '' && $formatoCount < 30) {

                                            $formato[$key . "-C"]['valor'] = $dataxls[3];
                                            $formato[$key . "-C"]['linea'] = $key . " - C";
                                            $formato[$key . "-C"]['error'] = "Campo vacio";
                                            $formatoCount++;
                                        }

                                        if ($dataxls[4] == '' && $formatoCount < 30) {

                                            $formato[$key . "-D"]['valor'] = $dataxls[4];
                                            $formato[$key . "-D"]['linea'] = $key . " - D";
                                            $formato[$key . "-D"]['error'] = "Campo vacio";

                                            $formatoCount++;
                                        }
                                    }
                                }
                            }
                        }


                        if (!empty($dataxls_final)) {

                            if ($formatoCount < 1) {


                                $evaluacion = new EvaluacionModel();

                                $datax = $request->input();

                                $datax['nombre_doc_subido'] = $request->file('calc')->getClientOriginalName();
                                $datax['nombre_doc_actual'] = $fileName;


                                error_log(print_r($this->params, true));


                                if (!$evaluacion->registrar_notificacion(array("data" => $datax, "data_detalle" => $dataxls_final))) {

                                    $this->params['mensaje'] = 'error';
                                };

                                $this->params['mensaje'] = 'exito';
                            } else {

                                $this->params['datos'] = $formato;
                                $this->params['mensaje'] = 'error2';
                            }
                        } else {

                            $this->params['mensaje'] = 'error';
                        }



                        $estatus = true;
                    } else {

                        error_log(print_r("Error al cargar ", true));
                    }

                    break;
                default:
                    error_log(print_r("Extension no valida :" . $mime, true));
            }
        }

        if (!$estatus) {

            $this->params['mensaje'] = 'error';
        }

        if ($this->params['mensaje'] != "exito") {

            unlink(public_path() . "/" . $path . $fileName);
        }


        return response()->json($this->params);
    }

}
