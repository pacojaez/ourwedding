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
            'photo' => 'image|max:1024|mimes:png', // 1MB Max
        ]);

        $this->photo->storeAs('public/invitation', 'invitation.png');

        // Storage::putFileAs('/public/img', $this->photo , );
        return redirect('/');
    }

    public function render()
    {

        return view('livewire.change-invitation');
    }
}
