<?php

namespace Database\Factories;

use App\Models\PresupuestoMaximo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresupuestoMaximoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PresupuestoMaximo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => $this->faker->numberBetween(6000, 25000)
        ];
    }
}
