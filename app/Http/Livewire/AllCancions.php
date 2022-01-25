<?php

namespace App\Http\Livewire;

use App\Models\Cancion;
use Livewire\Component;

class AllCancions extends Component
{
    protected $listeners = ['addedSong' => 'render'];

    public function render()
    {
        $cancions = Cancion::all();

        return view('livewire.all-cancions', [
            'cancions' => $cancions,
        ]);
    }
}
