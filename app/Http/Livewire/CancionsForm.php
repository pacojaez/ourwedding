<?php

namespace App\Http\Livewire;

use App\Models\Cancion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;

class CancionsForm extends Component
{

    /**
     * while loading the variable will be true
     *
     * @var boolean
     */
    public $loading = false;

    /**
     * variable for the title of the song
     *
     * @var string
     */
    public string $title = '';

    /**
     * variable for the author of the song
     *
     * @var string
     */
    public string $author = '';

    // public $errors;
    // public $name;
    // public $email;

    /**
     * Rules to validate the song attributes
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|unique:cancions,title|max:255',
        'author' => 'required',
    ];

    /**
     * Array with the error messages to be displayed
     *
     * @var array
     */
    protected $messages = [
        'title.required' => 'Necesitamos saber el título de la canción',
        'title.max' => 'Nombre demasiado largo para el título de la canción',
        'title.unique' => 'Esta canción ya está en la lista',
        // 'title.min:4' => 'El titulo debe tener 4 letras al menos',
        'author.required' => 'También necesitamos saber el autor',
        // 'author.min:4' => 'El autor debe tener 4 letras al menos',
    ];

    /**
     * Saves the song in the DB
     *
     * @return void
     */
    public function saveCancion()
    {
        $validatedData = $this->validate();

        $cancion = new Cancion();
        $cancion->title = $validatedData['title'];
        $cancion->author = $validatedData['author'];
        $cancion->user_id = Auth::user()->id;

        $cancion = $cancion->save();

        $this->title = '';
        $this->author = '';

        session()->flash('message', 'Canción añadida correctamente.....¡¡ANOTHER ONE, PLEASE!');

        return redirect()->to('/cancions');
    }

    /**
     * renders the wiew with the variables
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.cancions-form', [
            // 'loading' => $this->loading,
        ]);
    }

}
