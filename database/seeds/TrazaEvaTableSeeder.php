<?php

use Illuminate\Database\Seeder;

class TrazaEvaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('traza_eva')->delete();
        
        \DB::table('traza_eva')->insert(array (
            0 => 
            array (
                'fecha' => '2017-01-16 16:19:36.051845',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2017-01-16 16:19:36.051845',
                'id' => 72,
                'periodo' => '1',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1484599775.xls',
                'id_evaluacion' => 78,
            ),
            1 => 
            array (
                'fecha' => '2017-01-16 16:20:05.737918',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2017-01-16 16:20:05.737918',
                'id' => 73,
                'periodo' => '1',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1484599805.xls',
                'id_evaluacion' => 79,
            ),
            2 => 
            array (
                'fecha' => '2017-01-17 13:54:41.128101',
                'estatus' => true,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2017-01-17 13:54:41.128101',
                'id' => 74,
                'periodo' => '1',
                'nombre_doc_subido' => 'data.xls',
                'nombre_doc_actual' => 'calc-1484677480.xls',
                'id_evaluacion' => 80,
            ),
            3 => 
            array (
                'fecha' => '2016-12-13 15:57:56.580408',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2016-12-13 15:57:56.580408',
                'id' => 50,
                'periodo' => '2',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1481660876.xls',
                'id_evaluacion' => NULL,
            ),
            4 => 
            array (
                'fecha' => '2016-12-13 16:05:04.505896',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2016-12-13 16:05:04.505896',
                'id' => 51,
                'periodo' => '2',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1481661304.xls',
                'id_evaluacion' => NULL,
            ),
            5 => 
            array (
                'fecha' => '2016-12-16 11:50:29.4328',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2016-12-16 11:50:29.4328',
                'id' => 52,
                'periodo' => '2',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1481905229.xls',
                'id_evaluacion' => NULL,
            ),
            6 => 
            array (
                'fecha' => '2016-12-16 11:51:51.797058',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2016-12-16 11:51:51.797058',
                'id' => 53,
                'periodo' => '2',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1481905311.xls',
                'id_evaluacion' => NULL,
            ),
            7 => 
            array (
                'fecha' => '2016-12-16 11:55:59.904822',
                'estatus' => true,
                'id_usuario' => 1,
                'anno' => 2016,
                'fecha_registro' => '2016-12-16 11:55:59.904822',
                'id' => 54,
                'periodo' => '2',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1481905559.xls',
                'id_evaluacion' => 60,
            ),
            8 => 
            array (
                'fecha' => '2016-12-13 15:56:40.129357',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2015,
                'fecha_registro' => '2016-12-13 15:56:40.129357',
                'id' => 49,
                'periodo' => '1',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1481660800.xls',
                'id_evaluacion' => NULL,
            ),
            9 => 
            array (
                'fecha' => '2017-01-10 10:30:41.828584',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2015,
                'fecha_registro' => '2017-01-10 10:30:41.828584',
                'id' => 55,
                'periodo' => '1',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1484060441.xls',
                'id_evaluacion' => 61,
            ),
            10 => 
            array (
                'fecha' => '2017-01-13 16:42:22.572219',
                'estatus' => false,
                'id_usuario' => 1,
                'anno' => 2015,
                'fecha_registro' => '2017-01-13 16:42:22.572219',
                'id' => 58,
                'periodo' => '1',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1484341942.xls',
                'id_evaluacion' => 64,
            ),
            11 => 
            array (
                'fecha' => '2017-01-13 16:56:25.68422',
                'estatus' => true,
                'id_usuario' => 1,
                'anno' => 2015,
                'fecha_registro' => '2017-01-13 16:56:25.68422',
                'id' => 71,
                'periodo' => '1',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1484342785.xls',
                'id_evaluacion' => 77,
            ),
        ));
        
        
    }
}
