<?php

namespace Database\Seeders;

use App\Models\Vrsta;
use Illuminate\Database\Seeder;

class VrstaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vrsta::create([
            'vrsta' => 'Belo vino'
        ]);

        Vrsta::create([
            'vrsta' => 'Crno vino'
        ]);
        
        Vrsta::create([
            'vrsta' => 'Rose vino'
        ]);

    }
}
