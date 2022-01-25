<?php

namespace App\Http\Livewire;

use App\Models\Cancion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;

class CancionsForm extends Component
{
    public $loading = false;
    public $showAlertMessage = false;
    public $showSuccessMessage = false;

    public $title;
    public $author;
    public $errors;

    public $name;
    public $email;

    protected $rules = [
        'title' => 'required|unique:cancions,title',
        'author' => 'required',
    ];


    public function saveCancion()
    {
        // dd($this->rules);
        $validatedData = $this->validate();

        $cancion = new Cancion();
        $cancion->title = $validatedData['title'];
        $cancion->author = $validatedData['author'];
        $cancion->user_id = Auth::user()->id;

        $cancion = $cancion->save();

        $this->emitTo('all-cancions', 'addedSong');
        $this->title = '';
        $this->author = '';

        return redirect()->back();
    }

    // protected $rules = [
    //     'title' => 'required|unique',
    //     'author' => 'required',
    // ];

    protected $messages = [
        'title.required' => 'Necesitamos saber el título de la canción',
        'title.unique' => 'Esta canción ya está en la lista',
        // 'title.min:4' => 'El titulo debe tener 4 letras al menos',
        'author.required' => 'También necesitamos saber el autor',
        // 'author.min:4' => 'El autor debe tener 4 letras al menos',

    ];


    public function render()
    {
        // dd($this->loading);
        return view('livewire.cancions-form', [
            // 'loading' => $this->loading,
        ]);
    }

    // public function saveCancion( Request $request ){
    //     dd($_POST);
    //     $this->validate();

    //     $cancion = new Cancion();
    //     $cancion->title = $request->input('title');
    //     $cancion->author = $request->input('author');
    //     $cancion->user_id = Auth::user()->id;

    //     dd($cancion);

    //     $cancion->save();
    //     $this->loading = false;
    //     $this->showAlertMessage = false;
    //     $this->showSuccessMessage = true;

    //     return redirect('/');

    // }
}
