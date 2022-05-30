<?php

namespace Tests\Feature;

use App\Http\Livewire\CancionsForm;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cancion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SongUploadTest extends TestCase
{

    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_add_new_song()
    {

        $user = User::factory()->has(Cancion::factory([
            'title' => 'One more song',
            'author' => 'One more author',
            'style' => 'One more style',
        ]))->create();

        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $this->assertDatabaseHas('cancions', [
            'title' => 'One more song',
        ]);
    }

    public function test_user_can_not_add_new_song_without_title()
    {

        $user = User::factory
            ([
            'name' => 'Paco',
            'email'=> 'pacojaez@gmail.com',
            'password' => Hash::make('12345678'),
            ])
            ->create();

        $dataSong = [
            'title' => '',
            'author' => 'One Author',
            'user_id' => $user->id
        ];

        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $this->assertActionUsesFormRequest( CancionsForm::class, 'saveCancion', ''  );

        // $response = $this->get('cancions');

        // $response->assertSessionHas('title', 'Necesitamos saber el título de la canción');

        // $errors = session('errors');
        // $this->assertSessionHasErrors(['title' => 'tu cancion blablabla']);
        // $this->assertEquals($errors->get('title')[0],"Your error message for validation");
    }
}
