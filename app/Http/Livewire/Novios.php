<?php

namespace App\Http\Livewire;

use App\Models\Novio;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Novios extends Component
{
    public $novio;
    public $novia;

    public function render()
    {
        return view('livewire.novios');
    }

    public function saveChanges( Request $request )
    {
        // $validatedData = $this->validate();

        $novio = Novio::where('novio', 'like', TRUE);
        $novia = Novio::where('novia', 'like', TRUE);

        $novio->name = $request['novio'];
        $novio->novio = TRUE;
        $novia->name = $request['novia'];
        $novia->novia = TRUE;

        $novio->save();
        $novia->save();

        session()->flash('message', 'Cambios guardados');

        return redirect()->to('/');
    }
}
