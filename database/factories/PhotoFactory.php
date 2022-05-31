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
        // dd($this->downloadImage('app\public\images', true));

        return [
            'description' => $this->faker->sentence(4),
            // 'route' => $this->faker->image('public/storage/images', 640, 480, 'animals', true),
            'route' => $this->downloadImage('\images', true),
            'user_id' => User::all()->random()->id,
        ];
    }


    /**
     * Download a remote random image to disk and return its location
     *
     * Requires curl, or allow_url_fopen to be on in php.ini.
     *
     * @example '/path/to/dir/13b73edae8443990be1aa8f1a483bc27.png'
     *
     * @return bool|string
     */
    public function downloadImage(
        $dir = null,
        $fullPath = true,
    ) {
        // dd($dir);
        $trueRoute = (public_path('storage'.$dir));
        // dd($trueRoute);
        $trueRoute = null === $trueRoute ? sys_get_temp_dir() : $trueRoute; // GNU/Linux / OS X / Windows compatible
        // Validate directory path
        if (!is_dir($trueRoute) || !is_writable($trueRoute)) {
            throw new \InvalidArgumentException(sprintf('Cannot write to directory "%s"', $dir));
        }

        // Generate a random filename. Use the server address so that a file
        // generated at the same time on a different server won't have a collision.
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name . '.jpg';
        $fileToCopy = $trueRoute . DIRECTORY_SEPARATOR . $filename;
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        // $url = static::imageUrl($width, $height, $category, $randomize, $word, $gray);
        $url = 'https://picsum.photos/400';
        // save file
        $success = copy($url, $fileToCopy);

        if( $success){
            return $fullPath ? $filepath : $filename;
        }else{
            return new \RuntimeException('The image formatter downloads an image from a remote HTTP server. Therefore, it requires that PHP can request remote hosts, either via cURL or fopen()');
        }

    }
}
