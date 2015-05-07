<?php
/**
 * Created by PhpStorm.
 * User: sasha
 * Date: 16.04.2015
 * Time: 20:54
 */

use Faker\Factory as Faker;

class StarTableSeeder extends Seeder
{

    public function run()
    {


        $faker = Faker::create();
        $count = rand(1, 100);

        $sector =Sector::all();

        for ($i = 0; $i < $count; $i++) {
            $star = new Star();


            $star->name = $faker->firstName;
            $star->description = $faker->lastName;
            $star->sector_id = $sector[rand(0, count($sector)-1)]->id;

            $star->save();
        }

    }

}