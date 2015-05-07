<?php
/**
 * Created by PhpStorm.
 * User: sasha
 * Date: 16.04.2015
 * Time: 20:54
 */

use Faker\Factory as Faker;

class PlanetTableSeeder extends Seeder
{

    public function run()
    {


        $faker = Faker::create();
        $count = rand(1, 1000);
        $bioms = [ 'arid', 'asteroid', 'desert', 'forest', 'grasslands', 'jungle', 'magma', 'moon', 'savannah', 'snow', 'tentacle', 'tundra', 'volcano'];
        $oses = ['windows', 'linux', 'mac'];
        $images = ['planet_small.png', 'planet_large.jpg'];

        $users = User::where('isActive', '=', true)->get();
        $stars = Star::all();

        for ($i = 0; $i < $count; $i++) {
            $planet = new Planet();

            $planet->x = rand(0, 360);
            $planet->y = rand(-180, 180);
            $planet->level = rand(1, 10);
            $planet->planet = $faker->name;
            $planet->biome = $bioms[rand(0,12)];
            $planet->version = 'enraged_koala';
            $planet->os = $oses[rand(0,2)];
            $planet->comment = $faker->address;
            $planet->image = $images[rand(0,1)];

            $planet->user_id = $users[rand(0, count($users) - 1)]->id;
            $planet->star_id = $stars[rand(0, count($stars) - 1)]->id;

            $planet->save();
        }

    }

}