<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEvaluacionDetalleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('evaluacion_detalle', function(Blueprint $table)
		{
			$table->foreign('id_usuario', 'evaluacion_id_usuario_fkey')->references('id')->on('usuario')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_evaluacion', 'evaluacion_detalle_id_evaluacion_fkey')->references('id')->on('evaluacion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('evaluacion_detalle', function(Blueprint $table)
		{
			$table->dropForeign('evaluacion_id_usuario_fkey');
			$table->dropForeign('evaluacion_detalle_id_evaluacion_fkey');
		});
	}

}
