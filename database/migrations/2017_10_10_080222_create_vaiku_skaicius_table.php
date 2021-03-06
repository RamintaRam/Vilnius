<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVaikuSkaiciusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vaiku_skaicius', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->integer('count', true);
			$table->string('name', 250);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vaiku_skaicius');
	}

}
