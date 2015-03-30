<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnIsadminUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('isAdmin');
            $table->dropColumn('isActive');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->boolean('isAdmin')->default(false);
            $table->boolean('isActive')->index()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
