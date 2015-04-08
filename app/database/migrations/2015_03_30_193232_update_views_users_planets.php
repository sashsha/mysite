<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateViewsUsersPlanets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('planets', function(Blueprint $table)
        {
            $table->dropColumn('user_id');
            $table->dropColumn('views');
        });

        Schema::table('planets', function(Blueprint $table)
        {
            $table->integer('views')->unsigned()->nullable();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('planets', function (Blueprint $table) {
            $table->dropForeign('planets_user_id_foreign');
            $table->dropColumn('user_id');
        });
	}

}
