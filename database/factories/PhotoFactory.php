<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(4),
            // 'route' => $this->faker->image('public/storage/images', 640, 480, 'animals', true),
            'route' => $this->faker->image('public/storage/images',640,480, null, false),
            'user_id' => User::all()->random()->id,
        ];
    }
}
