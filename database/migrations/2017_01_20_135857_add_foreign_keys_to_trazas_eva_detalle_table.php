<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTrazasEvaDetalleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trazas_eva_detalle', function(Blueprint $table)
		{
			$table->foreign('id_usuario', 'mensaje_enviados_traza_id_usuario_fkey')->references('id')->on('usuario')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trazas_eva_detalle', function(Blueprint $table)
		{
			$table->dropForeign('mensaje_enviados_traza_id_usuario_fkey');
		});
	}

}
