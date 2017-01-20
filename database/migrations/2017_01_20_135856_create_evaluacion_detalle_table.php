<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluacionDetalleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluacion_detalle', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre_completo')->nullable();
			$table->float('puntuacion', 10, 0)->nullable()->default(0);
			$table->string('rango')->nullable();
			$table->dateTime('fecha')->nullable();
			$table->integer('cedula')->nullable();
			$table->integer('id_usuario')->nullable();
			$table->integer('id_evaluacion')->nullable();
			$table->integer('anno')->nullable();
			$table->char('periodo', 1)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('evaluacion_detalle');
	}

}
