<?php

use Illuminate\Database\Seeder;

class EvaluacionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('evaluacion')->delete();
        
        \DB::table('evaluacion')->insert(array (
            0 => 
            array (
                'fecha' => '2016-12-16 11:55:59.904822',
                'estatus' => true,
                'id_usuario' => 1,
                'id' => 60,
                'anno' => 2016,
                'periodo' => '2',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1481905559.xls',
            ),
            1 => 
            array (
                'fecha' => '2017-01-13 16:56:25.68422',
                'estatus' => true,
                'id_usuario' => 1,
                'id' => 77,
                'anno' => 2015,
                'periodo' => '1',
                'nombre_doc_subido' => 'dataSed.xls',
                'nombre_doc_actual' => 'calc-1484342785.xls',
            ),
            2 => 
            array (
                'fecha' => '2017-01-17 13:54:41.128101',
                'estatus' => true,
                'id_usuario' => 1,
                'id' => 80,
                'anno' => 2016,
                'periodo' => '1',
                'nombre_doc_subido' => 'data.xls',
                'nombre_doc_actual' => 'calc-1484677480.xls',
            ),
        ));
        
        
    }
}
