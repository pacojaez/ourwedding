<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Cancion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CancionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cancion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'style' => $this->faker->randomElement(['Rock', 'Pop', 'K-pop', 'Rumba', 'Vals', 'Salsa', 'Bachata']),
            'user_id' => User::all()->random()->id,
        ];
    }
}
