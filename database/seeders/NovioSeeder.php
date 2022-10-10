<?php

namespace Database\Seeders;

use App\Models\Novio;
use Illuminate\Database\Seeder;

class NovioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Novio::create([
            'name' => 'Olga',
            'novia' => TRUE,
            'novio' => FALSE
        ]);
        Novio::create([
            'name' => 'Paco',
            'novia' => FALSE,
            'novio' => TRUE
        ]);
    }
}
