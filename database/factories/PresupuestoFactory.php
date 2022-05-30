<?php

namespace Database\Factories;

use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresupuestoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Presupuesto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'concepto' => $this->faker->sentence(6),
            'contacto' => $this->faker->email(),
            'observaciones' => $this->faker->sentence(5),
            'coste' => $this->faker->randomElement([100, 3000, 250, 1800, 4000, 400, 180, 500, 675]),
            'pagado' => $this->faker->randomElement([0,1]),
            'adelantado' => $this->faker->numberBetween( 100, 3000),
        ];
    }
}
