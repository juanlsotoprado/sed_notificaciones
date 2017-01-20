<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'migration' => '2017_01_20_102649_create_perfil_table',
                'batch' => 0,
            ),
            1 => 
            array (
                'migration' => '2017_01_20_102649_create_trazas_eva_detalle_table',
                'batch' => 0,
            ),
            2 => 
            array (
                'migration' => '2017_01_20_102649_create_evaluacion_table',
                'batch' => 0,
            ),
            3 => 
            array (
                'migration' => '2017_01_20_102649_create_usuario_table',
                'batch' => 0,
            ),
            4 => 
            array (
                'migration' => '2017_01_20_102649_create_traza_eva_table',
                'batch' => 0,
            ),
            5 => 
            array (
                'migration' => '2017_01_20_102649_create_evaluacion_detalle_table',
                'batch' => 0,
            ),
            6 => 
            array (
                'migration' => '2017_01_20_102651_add_foreign_keys_to_trazas_eva_detalle_table',
                'batch' => 0,
            ),
            7 => 
            array (
                'migration' => '2017_01_20_102651_add_foreign_keys_to_evaluacion_table',
                'batch' => 0,
            ),
            8 => 
            array (
                'migration' => '2017_01_20_102651_add_foreign_keys_to_usuario_table',
                'batch' => 0,
            ),
            9 => 
            array (
                'migration' => '2017_01_20_102651_add_foreign_keys_to_traza_eva_table',
                'batch' => 0,
            ),
            10 => 
            array (
                'migration' => '2017_01_20_102651_add_foreign_keys_to_evaluacion_detalle_table',
                'batch' => 0,
            ),
            11 => 
            array (
                'migration' => '2017_01_20_135856_create_perfil_table',
                'batch' => 0,
            ),
            12 => 
            array (
                'migration' => '2017_01_20_135856_create_trazas_eva_detalle_table',
                'batch' => 0,
            ),
            13 => 
            array (
                'migration' => '2017_01_20_135856_create_evaluacion_table',
                'batch' => 0,
            ),
            14 => 
            array (
                'migration' => '2017_01_20_135856_create_usuario_table',
                'batch' => 0,
            ),
            15 => 
            array (
                'migration' => '2017_01_20_135856_create_traza_eva_table',
                'batch' => 0,
            ),
            16 => 
            array (
                'migration' => '2017_01_20_135856_create_evaluacion_detalle_table',
                'batch' => 0,
            ),
            17 => 
            array (
                'migration' => '2017_01_20_135857_add_foreign_keys_to_trazas_eva_detalle_table',
                'batch' => 0,
            ),
            18 => 
            array (
                'migration' => '2017_01_20_135857_add_foreign_keys_to_evaluacion_table',
                'batch' => 0,
            ),
            19 => 
            array (
                'migration' => '2017_01_20_135857_add_foreign_keys_to_usuario_table',
                'batch' => 0,
            ),
            20 => 
            array (
                'migration' => '2017_01_20_135857_add_foreign_keys_to_traza_eva_table',
                'batch' => 0,
            ),
            21 => 
            array (
                'migration' => '2017_01_20_135857_add_foreign_keys_to_evaluacion_detalle_table',
                'batch' => 0,
            ),
        ));
        
        
    }
}
