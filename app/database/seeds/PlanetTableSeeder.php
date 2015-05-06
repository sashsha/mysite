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
        DB::table('planets')->delete();

        $faker = Faker::create();
        $count = rand(1, 100);
        $sectors = [ 'alpha', 'beta', 'gamma', 'delta', 'x'];
        $bioms = [ 'arid', 'asteroid', 'desert', 'forest', 'grasslands', 'jungle', 'magma', 'moon', 'savannah', 'snow', 'tentacle', 'tundra', 'volcano'];
        $oses = ['windows', 'linux', 'mac'];
        $images = ['planet_small.png', 'planet_large.jpg'];

        $users = User::where('isActive', '=', true)->get();

        for ($i = 0; $i < $count; $i++) {
            $planet = new Planet();

            $planet->x = rand(0, 360);
            $planet->y = rand(-180, 180);
            $planet->level = rand(1, 10);
            $planet->sector = $sectors[rand(0, 4)];
            $planet->star = $faker->firstName;
            $planet->system = $faker->lastName;
            $planet->planet = $faker->name;
            $planet->biome = $bioms[rand(0,12)];
            $planet->version = 'enraged_koala';
            $planet->os = $oses[rand(0,2)];
            $planet->comment = $faker->address;
            $planet->image = $images[rand(0,1)];

            $planet->user_id = $users[rand(0, count($users) - 1)]->id;

            $planet->save();
        }

    }

}