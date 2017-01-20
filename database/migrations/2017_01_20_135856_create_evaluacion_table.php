<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluacion', function(Blueprint $table)
		{
			$table->dateTime('fecha')->nullable();
			$table->boolean('estatus')->nullable();
			$table->integer('id_usuario')->nullable();
			$table->integer('id', true);
			$table->integer('anno')->nullable();
			$table->char('periodo', 1)->nullable();
			$table->string('nombre_doc_subido')->nullable();
			$table->string('nombre_doc_actual')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('evaluacion');
	}

}
