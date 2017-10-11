<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGyventojaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gyventojai', function(Blueprint $table)
		{
			$table->foreign('gatve', 'fk_gyventojai_gatve1')->references('id')->on('gatve')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('gimimo_metai', 'fk_gyventojai_gimimo_metai1')->references('id')->on('gimimo_metai')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('gimimo_valstybe', 'fk_gyventojai_gimimo_valstybe1')->references('id')->on('gimimo_valstybe')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('lytis', 'fk_gyventojai_lytis1')->references('id')->on('lytis')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('seimos_padetis', 'fk_gyventojai_seimos_padetis1')->references('id')->on('seimos_padetis')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('seniunija', 'fk_gyventojai_seniunija1')->references('id')->on('seniunija')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vaiku_skaicius', 'fk_gyventojai_vaiku_skaicius')->references('id')->on('vaiku_skaicius')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gyventojai', function(Blueprint $table)
		{
			$table->dropForeign('fk_gyventojai_gatve1');
			$table->dropForeign('fk_gyventojai_gimimo_metai1');
			$table->dropForeign('fk_gyventojai_gimimo_valstybe1');
			$table->dropForeign('fk_gyventojai_lytis1');
			$table->dropForeign('fk_gyventojai_seimos_padetis1');
			$table->dropForeign('fk_gyventojai_seniunija1');
			$table->dropForeign('fk_gyventojai_vaiku_skaicius');
		});
	}

}
