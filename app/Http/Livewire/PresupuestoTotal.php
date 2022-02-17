<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GetPresupuestoService;

class PresupuestoTotal extends Component
{
    protected GetPresupuestoService $getPresupuesto;
    public ?int $balance = null;
    public ?int $paid = null;
    public ?int $pending = null;
    public $presupuestoMaximo;

    public function mount( GetPresupuestoService $getPresupuesto)
    {
        $this->getPresupuesto = $getPresupuesto;

        $this->presupuestoMaximo = $this->getPresupuesto->getMax()->total;
        $this->paid = $this->getPresupuesto->getPaid();
        $this->pending = $this->getPresupuesto->getPending();
        $this->balance = $this->presupuestoMaximo - ($this->paid + $this->pending);
    }


    public function render()
    {
        return view('livewire.presupuesto-total', [
            'balance' => $this->balance,
            'paid' => $this->paid,
            'pending' => $this->pending,
            'presupuestoMaximo' => $this->presupuestoMaximo
        ]);
    }
}
