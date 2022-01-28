<?php

namespace App\Http\Livewire;

use App\Models\Cancion;
use Livewire\Component;

class AllCancions extends Component
{
    // protected $listeners = ['addedSong' => 'addedSong'];

    // public function addedSong (){

    //     // session()->flash('message', 'Canción añadida correctamente.....¡¡ANOTHER ONE, PLEASE!!!!');

    // }

    public function render()
    {
        $cancions = Cancion::orderByDesc('created_at')
                    ->get();
                    // dd(session()->has('message'));
        return view('livewire.all-cancions', [
            'cancions' => $cancions,
        ]);
    }
}
