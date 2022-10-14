<?php

namespace App\Http\Livewire;

use App\Models\Novio;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class Novios extends Component
{

    public $novia;
    public $noviaemail;
    public $noviaphone;
    public $novio;
    public $novioemail;
    public $noviophone;

    public function mount(){
        $novia = Novio::where('novia', TRUE)->firstOrFail();
        $this->novia = $novia->name;
        $this->noviaemail = $novia->email;
        $this->noviaphone = $novia->phone;
        $novio = Novio::where('novio', TRUE)->firstOrFail();
        $this->novio = $novio->name;
        $this->novioemail = $novio->email;
        $this->noviophone = $novio->phone;
    }

    public function render()
    {

        return view('livewire.novios');
    }


    protected function rules()
    {
        return [
            'novio' => 'required|',
            'novia' => 'required|',
            'noviaemail' => 'email|required',
            'noviaphone' => 'numeric|required',
            'novioemail' => 'email|required',
            'noviophone' => 'numeric|required'
        ];
    }



    public function saveChanges()
    {
        $validatedData = $this->validate();

        $novio = Novio::where('novio', 'like', TRUE)->firstOrFail();
        $novia = Novio::where('novia', 'like', TRUE)->firstOrFail();

        $novio->name = $validatedData['novio'];
        $novio->email = $validatedData['novioemail'];
        $novio->phone = $validatedData['noviophone'];
        $novio->novio = TRUE;
        $novia->name = $validatedData['novia'];
        $novia->email = $validatedData['noviaemail'];
        $novia->phone = $validatedData['noviaphone'];
        $novia->novia = TRUE;

        $novio->save();
        $novia->save();

        session()->flash('message', 'Cambios guardados');

        return redirect()->to('/');
    }
}
