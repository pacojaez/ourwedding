<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class PhotoUpload extends Component
{
    use WithFileUploads;

    /**
     * variable to manipulate the photo upload
     *
     * @var [type]
     */
    public $photo;

    /**
     * description of the photo
     *
     * @var string
     */
    public string $description;

    /**
     * Rules to validate the upload
     *
     * @var array
     */
    protected $rules = [
        'description' => 'required|min:5',
    ];

     /**
     * Array with the error messages to be displayed
     *
     * @var array
     */
    protected $messages = [
        'description.required' => 'Ponle alguna descripción aunque sea corta',
    ];

    /**
     * saves a new photo in the fyleSystem and and the path to the DB
     *
     * @return void
     */
    public function save()
    {
        $validatedData = $this->validate();

        $path = $this->photo->store('images', 'public');

        $this->photo = new Photo();
        $this->photo->description = $validatedData['description'];
        $this->photo->user_id = Auth::user()->id;
        $this->photo->route = $path;
        $this->photo->save();

        session()->flash('message', 'FOTO AÑADIDA CORRECTAMENTE.');

        $this->photo = null;

        return redirect()->to('/galeria');
    }

    /**
     * renders the form to add a new photo
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.photo-upload');
    }
}
