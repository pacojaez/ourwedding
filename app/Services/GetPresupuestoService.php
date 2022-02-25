<?php
namespace App\Services;

use App\Models\Presupuesto;
use App\Models\PresupuestoMaximo;
use Illuminate\Database\Eloquent\Collection;


class GetPresupuestoService
{
    /**
     * Variable to store all the presupuesto linea from the DB
     *
     * @var Collection|null
     */
    public ?Collection $presupuestos;

    /**
     * Stores the result presupuestMax substracting ( paid plus pending)
     *
     * @var integer
     */
    public int $balance;

    /**
     * stores the total paid presupuesto linea
     *
     * @var integer|null
     */
    public ?int $paid = null;

    /**
     * Stores the pending amount
     *
     * @var integer|null
     */
    public ?int $pending = null;

    /**
     * Variable to get the Max Presupuesto from the DB
     *
     * @var integer|null
     */
    public ?PresupuestoMaximo $presupuesto_maximo;

    /**
     * Updates the max presupuesto in the DB
     *
     * @param integer $newMax
     * @return void
     */
    public function updatePresupuestoMax( int $newMax )
    {
        $this->presupuestoMaximo = $newMax;
    }

    /**
     * Gets all the presupuesto linea that have been paid
     *
     * @return integer|null
     */
    public function getPaid(): ?int
    {
        $this->presupuestos = Presupuesto::all();
        $this->paid = 0;
        foreach( $this->presupuestos as $presupuesto){
            if( $presupuesto->pagado){
                $this->paid += $presupuesto->coste;
            }
        }
        return $this->paid;
    }

    /**
     * Gets all the presupuesto linea pending
     *
     * @return integer|null
     */
    public function getPending(): ?int
    {
        $this->presupuestos = Presupuesto::all();
        $this->pending = 0;

        foreach( $this->presupuestos as $presupuesto){
            if( !$presupuesto->pagado){
                // $this->pending += $presupuesto->coste;
                $this->pending += $presupuesto->coste;
            }
        }
        return $this->pending;
    }

    /**
     * Gets the latest presupuestoMaximo entry in the DB
     *
     * @return void
     */
    public function getMax()
    {
        return $this->presupuesto_maximo = PresupuestoMaximo::latest()->first();
    }

    /**
     * Calculates the diference between the presupuestoMaximo and the sum of all presupuesto lineas
     *
     * @return void
     */
    public function getBalance()
    {
        return $this->presupuesto_maximo - $this->getPaid();
    }

}
