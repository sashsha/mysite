<?php
/**
 * Created by PhpStorm.
 * User: sasha
 * Date: 16.04.2015
 * Time: 20:54
 */



class DeleteTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('planets')->delete();
        DB::table('stars')->delete();
        DB::table('sectors')->delete();
        DB::table('users')->delete();
    }

}