<?php

namespace App\Http\Livewire;

use App\Models\Cancion;
use Livewire\Component;

class AllCancions extends Component
{
    /**
     * get all the songs from the DB and renders the wiew
     *
     * @return void
     */
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
