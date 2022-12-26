<?php

namespace Database\Seeders;

use App\Models\Vinarija;
use Illuminate\Database\Seeder;

class VinarijaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vinarija::create([
            'vinarija' => 'Kiš'
        ]);

        Vinarija::create([
            'vinarija' => 'Šapat'
        ]);

        Vinarija::create([
            'vinarija' => 'Aleksić'
        ]);

        Vinarija::create([
            'vinarija' => 'Erdevik'
        ]);

    }
}
