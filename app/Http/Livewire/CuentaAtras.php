<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Livewire\Component;

class CuentaAtras extends Component
{

    /**
     * a variable to get the diff between now and the event dateTimne
     *
     * @var [type]
     */
    public $inicio;

    /**
     * The dateTime of the event
     *
     * @var Carbon
     */
    public Carbon $fin;

    /**
     * Variable for sending to the view the diff
     *
     * @var [type]
     */
    public $contador;

    /**
     * public now to calculate if the event is past or future
     */
    public $now;

    /**
     * defines the event dateTime using a Carbon instance
     *
     * @return void
     */
    public function mount(){
        $this->fin = new Carbon('2022-08-13 19:00:00');
    }

    /**
     * Renders the view
     *
     * @return void
     */
    public function render()
    {
        // $dif = $this->fin->diffInHours($this->inicio);
        if( $this->fin->lt( Carbon::now() ))
            $dif ='Ya llevamos CASADOS: ';
        else
            $dif = 'Aún falta para la boda: ';

        return view('livewire.cuenta-atras', [
            'dif' => $dif,
        ]);
    }

    /**
     * function that be called to get the diff between now and the event datetime
     *
     * @return void
     */
    public function cuentaAtras(){
        return $this->contador = $this->fin->diffForHumans($this->inicio, [
            'options' => Carbon::JUST_NOW,
            'syntax' => CarbonInterface::DIFF_ABSOLUTE,
            'parts' => 6,
            'short' => true
        ]);
    }
}
