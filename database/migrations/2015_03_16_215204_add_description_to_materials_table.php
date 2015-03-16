<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Doctrine\DBAL;

class AddDescriptionToMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('materials', function(Blueprint $table)
		{
            $table->string('description', 1024);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('materials', function(Blueprint $table)
		{
            $table->dropColumn('description');
		});
	}

}
