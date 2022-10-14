<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Adress as Direccion;

class Adress extends Component
{

    public $adress;
    public $getFromDatabase;

    public function mount(){
        $this->getFromDatabase = Direccion::first();
        $this->adress = $this->getFromDatabase->direccion;
    }

    public function render()
    {
        return view('livewire.adress', [
            'adress' => $this->adress
        ]);
    }

    protected function rules()
    {
        return [
            'adress' => 'required|string|max:255',
        ];
    }

    public function saveChanges()
    {
        $validatedData = $this->validate();

        $this->getFromDatabase->direccion = $validatedData['adress'];

        $this->getFromDatabase->save();

        session()->flash('message', 'Cambios guardados');

        return redirect()->to('/');
    }
}
