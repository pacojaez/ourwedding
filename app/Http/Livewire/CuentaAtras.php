<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Livewire\Component;

class CuentaAtras extends Component
{
    public $inicio;
    public $fin;
    public $contador;

    public function mount(){
        $this->final = new Carbon('2022-08-13 18:00:00');
    }

    public function render()
    {
        return view('livewire.cuenta-atras');
    }

    public function cuentaAtras(){
        $this->contador = $this->final->diffForHumans($this->inicio, [
            'options' => Carbon::JUST_NOW,
            'syntax' => CarbonInterface::DIFF_ABSOLUTE,
            'parts' => 6,
            'short' => true
        ]);
    }
}
