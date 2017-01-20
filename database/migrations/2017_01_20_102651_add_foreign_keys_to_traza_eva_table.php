<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTrazaEvaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('traza_eva', function(Blueprint $table)
		{
			$table->foreign('id_usuario', 'evaluacion_id_usuario_fkey')->references('id')->on('usuario')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('traza_eva', function(Blueprint $table)
		{
			$table->dropForeign('evaluacion_id_usuario_fkey');
		});
	}

}
