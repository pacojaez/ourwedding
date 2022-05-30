<?php

namespace Database\Seeders;

use App\Models\Cancion;
use Illuminate\Database\Seeder;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cancion::factory()
            ->count(25)
            ->create();
    }
}
