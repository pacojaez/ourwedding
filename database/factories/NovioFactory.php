<?php

namespace Database\Factories;

use App\Models\Novio;
use Illuminate\Database\Eloquent\Factories\Factory;

class NovioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Novio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'name' => 'Olga',
        //     'novia' => TRUE,
        //     'novio' => FALSE
        // ];
    }
}
