<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CancionSeeder::class,
            HabitacionSeeder::class,
            PresupuestoMaximoSeeder::class,
            PresupuestoSeeder::class,
            TodoSeeder::class,
            NovioSeeder::class
            // PhotoSeeder::class,
        ]);
    }
}
