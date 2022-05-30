<?php

namespace Database\Seeders;

use App\Models\PresupuestoMaximo;
use Illuminate\Database\Seeder;

class PresupuestoMaximoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PresupuestoMaximo::factory()
            ->create();
    }
}
