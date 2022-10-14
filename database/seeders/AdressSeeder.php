<?php

namespace Database\Seeders;

use App\Models\Adress;
use Illuminate\Database\Seeder;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adress::create([
            'direccion' => 'C/ Tarragona 61-63, Terrassa Barcelona'
        ]);

    }
}
