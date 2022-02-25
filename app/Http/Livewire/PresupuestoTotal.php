<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GetPresupuestoService;

class PresupuestoTotal extends Component
{
    /**
     * variable to store the presupuesto
     *
     * @var GetPresupuestoService
     */
    protected GetPresupuestoService $getPresupuesto;

    /**
     * Variable that stores the balance of the presupuesto
     *
     * @var integer|null
     */
    public ?int $balance = null;

    /**
     * variable that stores the total paid
     *
     * @var integer|null
     */
    public ?int $paid = null;

    /**
     * variable that stores the pending amount
     *
     * @var integer|null
     */
    public ?int $pending = null;

    /**
     * variable to store the max presupuesto from the DB
     *
     * @var integer|null
     */
    public ?int $presupuestoMaximo;

    /**
     * Initializes all the variables before render the view
     *
     * @param GetPresupuestoService $getPresupuesto
     * @return void
     */
    public function mount( GetPresupuestoService $getPresupuesto)
    {
        $this->getPresupuesto = $getPresupuesto;

        $this->presupuestoMaximo =  isset($this->getPresupuesto->getMax()->total) ? $this->getPresupuesto->getMax()->total : 0 ;
        $this->paid = ($this->getPresupuesto->getPaid() != null ) ? $this->getPresupuesto->getPaid() : 0;
        $this->pending = $this->getPresupuesto->getPending() ? $this->getPresupuesto->getPending() : 0;
        $this->balance = $this->presupuestoMaximo - ($this->paid + $this->pending);
    }

    /**
     * Renders the view
     *
     * @return void
     */
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
