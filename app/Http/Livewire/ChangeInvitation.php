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
            'photo' => 'image|max:5000|mimes:png', // 5MB Max
        ]);

        if($this->photo->storeAs('/invitation', 'invitation.png')){
            session()->flash('message', 'Invitación cambiada correctamente. Refresca la caché del navegador');
        }else{
            session()->flash('message', 'No se ha podido guaradar la foto, vuelve a intentarlo');
        }

        // Storage::putFileAs('/public/img', $this->photo , );

        return redirect()->route('changeInvitation');
    }

    public function render()
    {

        return view('livewire.change-invitation');
    }
}
