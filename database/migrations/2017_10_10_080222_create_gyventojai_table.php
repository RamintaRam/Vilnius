<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGyventojaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gyventojai', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->integer('count', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('gimimo_metai', 36)->nullable();
			$table->string('gimimo_valstybe', 36)->nullable();
			$table->string('lytis', 36)->nullable();
			$table->string('seimos_padetis', 36)->nullable();
			$table->string('vaiku_skaicius', 36)->nullable();
			$table->string('seniunija', 36)->nullable();
			$table->string('gatve', 36)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gyventojai');
	}

}
