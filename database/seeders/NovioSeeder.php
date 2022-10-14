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
            'novio' => FALSE,
            'email' => 'admin@admin.com',
            'phone' => '666666666'
        ]);
        Novio::create([
            'name' => 'Paco',
            'novia' => FALSE,
            'novio' => TRUE,
            'email' => 'admin2@admin.com',
            'phone' => '666666667'
        ]);
    }
}
