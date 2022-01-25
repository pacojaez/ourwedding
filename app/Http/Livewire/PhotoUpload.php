<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class PhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $description;

    protected $rules = [
        'description' => 'required|min:5',
    ];

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

    public function render()
    {
        return view('livewire.photo-upload');
    }
}
