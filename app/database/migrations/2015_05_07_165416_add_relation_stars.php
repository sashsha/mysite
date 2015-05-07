<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationStars extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('stars', function(Blueprint $table)
        {
            $table->integer('sector_id')->unsigned()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('stars', function(Blueprint $table)
        {
            $table->dropForeign('stars_sector_id_foreign');
            $table->dropColumn('sector_id');
        });
	}

}
