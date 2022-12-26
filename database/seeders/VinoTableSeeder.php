<?php

namespace Database\Seeders;

use App\Models\Vino;
use Illuminate\Database\Seeder;

class VinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {

            Vino::create([
                'naziv' => $faker->firstName(),
                'ambalaza' => $faker->randomElement(['500 ml','750 ml','1000 ml']),
                'vrstaId' => rand(1,3),
                'vinarijaId' => rand(1,4)
            ]);
        }
    }
}
