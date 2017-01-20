<?php

use Illuminate\Database\Seeder;

class PerfilTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perfil')->delete();
        
        \DB::table('perfil')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descripcion' => 'ADMINISTRADOR',
                'fecha' => '2016-10-20 17:30:46.846218-04:30',
            ),
            1 => 
            array (
                'id' => 4,
                'descripcion' => 'ANALISTA',
                'fecha' => '2016-11-24 10:44:24.133811-04:30',
            ),
            2 => 
            array (
                'id' => 6,
                'descripcion' => 'OTIC',
                'fecha' => '2016-12-14 08:44:13.693006-04:30',
            ),
        ));
        
        
    }
}
