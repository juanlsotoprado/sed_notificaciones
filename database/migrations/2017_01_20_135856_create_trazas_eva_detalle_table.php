<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrazasEvaDetalleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trazas_eva_detalle', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_usuario')->nullable();
			$table->datetimetz('fecha')->nullable();
			$table->integer('cedula')->nullable();
			$table->string('nombre_completo')->nullable();
			$table->float('puntuacion', 10, 0)->nullable()->default(0);
			$table->string('rango')->nullable();
			$table->dateTime('fecha_registro')->nullable();
			$table->integer('anno')->nullable();
			$table->char('periodo', 1)->nullable();
			$table->integer('id_evaluacion')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trazas_eva_detalle');
	}

}
