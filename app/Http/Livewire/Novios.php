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


    protected function rules()
    {
        return [
            'novio' => 'required|',
            'novia' => 'required|'
        ];
    }



    public function saveChanges()
    {
         $validatedData = $this->validate();

        $novio = Novio::where('novio', 'like', TRUE)->firstOrFail();
        $novia = Novio::where('novia', 'like', TRUE)->firstOrFail();

        $novio->name = $validatedData['novio'];
        $novio->novio = TRUE;
        $novia->name = $validatedData['novia'];
        $novia->novia = TRUE;

        $novio->save();
        $novia->save();

        session()->flash('message', 'Cambios guardados');

        return redirect()->to('/');
    }
}
