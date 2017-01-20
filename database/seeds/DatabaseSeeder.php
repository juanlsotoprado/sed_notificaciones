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
       //  $this->call(UsersTableSeeder::class);
        $this->call(PerfilTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(EvaluacionTableSeeder::class);
        $this->call(EvaluacionDetalleTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(TrazaEvaTableSeeder::class);
        $this->call(TrazasEvaDetalleTableSeeder::class);
    }
}
