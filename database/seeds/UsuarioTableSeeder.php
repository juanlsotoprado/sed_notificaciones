<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('usuario')->delete();
        
        \DB::table('usuario')->insert(array (
            0 => 
            array (
                'id' => 17,
                'cedula' => 14768735,
                'estatus' => true,
                'fecha' => '15:52:55.16247',
                'id_perfil' => 1,
                'nombre_apellido' => 'Ana Navarro',
            ),
            1 => 
            array (
                'id' => 18,
                'cedula' => 17300068,
                'estatus' => true,
                'fecha' => '15:53:27.584901',
                'id_perfil' => 1,
                'nombre_apellido' => 'Yuddelia Solis',
            ),
            2 => 
            array (
                'id' => 1,
                'cedula' => 19163767,
                'estatus' => true,
                'fecha' => '08:57:30.198448',
                'id_perfil' => 6,
                'nombre_apellido' => 'Juan Soto',
            ),
            3 => 
            array (
                'id' => 19,
                'cedula' => 13156604,
                'estatus' => true,
                'fecha' => '15:24:14.252538',
                'id_perfil' => 1,
                'nombre_apellido' => 'Nairobi Josefina Manrique Rojas',
            ),
        ));
        
        
    }
}
