<?php
namespace App\Services;

use App\Models\Presupuesto;
use App\Models\PresupuestoMaximo;


class GetPresupuestoService
{
    public $presupuestoMaxActual;
    public $presupuestos;
    public int $balance;
    public ?int $paid = null;
    public ?int $pending = null;

    public int $presupuesto_maximo = 6000;
    public int $presupuesto_actual = 0;
    public int $saldo = 0;

    // protected $listeners = ['presupuestoMaxModified' => 'updatePresupuestMax'];

    public function updatePresupuestoMax( int $newMax )
    {

        $this->presupuestoMaximo = $newMax;
        // dd($this->presupuestoMaximo);
    }

    public function getPaid(): int
    {
        $this->presupuestos = Presupuesto::all();

        foreach( $this->presupuestos as $presupuesto){
            if( $presupuesto->pagado){
                $this->paid += $presupuesto->coste;
            }
        }
        return $this->paid;
    }

    public function getPending(): int
    {
        $this->presupuestos = Presupuesto::all();

        foreach( $this->presupuestos as $presupuesto){
            if( !$presupuesto->pagado){
                $this->pending += $presupuesto->coste;
            }
        }
        return $this->pending;
    }

    public function getMax()
    {
        return $this->presupuestoMaxActual = PresupuestoMaximo::latest()->first();
    }

    public function getBalance()
    {
        return $this->presupuestoMaximo - $this->getPaid();
    }

}
