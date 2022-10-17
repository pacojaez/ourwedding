<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ChangeInvitation extends Component
{
    use WithFileUploads;

    public $photo;

    public function save()
    {

        $this->validate([
            'photo' => 'required|image|max:5000|mimes:png', // 5MB Max
        ]);

        if($this->photo->storeAs('/invitation', 'invitation.png')){
            session()->flash('message', 'Invitación cambiada correctamente. Refresca la caché del navegador');
        }else{
            session()->flash('message', 'No se ha podido guardar la foto, vuelve a intentarlo');
        }

        // Storage::putFileAs('/public/img', $this->photo , );

        return redirect()->route('changeInvitation');
    }

    public function render()
    {

        return view('livewire.change-invitation');
    }

    protected $messages = [
        'photo.mimes' => 'La foto debe de ser en formato PNG.',
        'photo.image' => 'La foto debe de ser en formato imagen PNG',
        'photo.required' => 'Debes de elegir unha foto',
        'photo.max' => 'Solo se permite la subida der ficheros de hasta 5Mb',
    ];
}
