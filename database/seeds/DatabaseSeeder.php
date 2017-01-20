<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('PerfilTableSeeder::class');
        $this->call('UsuarioTableSeeder');
        $this->call('EvaluacionTableSeeder');
        $this->call('EvaluacionDetalleTableSeeder');
        $this->call('MigrationsTableSeeder');
        $this->call('TrazaEvaTableSeeder');
        $this->call('TrazasEvaDetalleTableSeeder');
    }
}
