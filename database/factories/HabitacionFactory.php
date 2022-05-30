<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Habitacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Habitacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'capacidad' => $this->faker->numberBetween(1,4),
            'ocupante1' => User::all()->random()->name,
            'ocupante2' => User::all()->random()->name,
            'ocupante3' => User::all()->random()->name,
            'ocupante4' => User::all()->random()->name,
            'planta' => $this->faker->numberBetween(0,5),
            'camas' => $this->faker->randomElement(['Doble', 'Dos dobles', 'Individual', 'Dos individuales']),
            'observaciones' => $this->faker->sentence(2),
        ];
    }
}
