<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrazaEvaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('traza_eva', function(Blueprint $table)
		{
			$table->dateTime('fecha')->nullable();
			$table->boolean('estatus')->nullable();
			$table->integer('id_usuario')->nullable();
			$table->integer('anno')->nullable();
			$table->dateTime('fecha_registro')->nullable();
			$table->integer('id', true);
			$table->char('periodo', 1)->nullable();
			$table->string('nombre_doc_subido')->nullable();
			$table->string('nombre_doc_actual')->nullable();
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
		Schema::drop('traza_eva');
	}

}
