<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationPlanets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('planets', function(Blueprint $table)
        {


            $table->integer('star_id')->unsigned()->nullable();
            $table->foreign('star_id')->references('id')->on('stars');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

        Schema::table('planets', function(Blueprint $table)
        {
            $table->dropForeign('planets_star_id_foreign');
            $table->dropColumn('star_id');
        });
	}

}
