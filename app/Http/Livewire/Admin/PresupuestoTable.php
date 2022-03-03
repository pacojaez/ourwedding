<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Presupuesto;
use App\Models\PresupuestoMaximo;
use Illuminate\Database\Eloquent\Collection;
use App\Services\GetPresupuestoService;
use Database\Seeders\PresupuestoMaximoSeeder;

class PresupuestoTable extends Component
{
    /**
     * a collection of presupuestos
     *
     * @var Collection
     */
    public Collection $presupuestos;


    /**
     * a single presupuesto
     *
     * @var
     */
    public $presupuesto;

    /**
     * A new value for the max Presupuesto
     *
     * @var integer
     */
    public int $presupuestoMaxNuevo = 0;

    /**
     * A varioable needed to confirm a presupuesto deletion
     *
     * @var boolean
     */
    public bool $confirmingPresupuestoDeletion = false;

    /**
     * A variable needed to show the modal and add a presupuesto
     *
     * @var boolean
     */
    public bool $confirmingPresupuestoAdd = false;

    /**
     * A variable needed to show the modal for adding a new max presupuesto
     *
     * @var boolean
     */
    public bool $confirmingPresupuestoMax = false;

    /**
     * Rules for validate the presupuesto form for a new Presupuesto
     *
     * @var array
     */
    protected $rules = [
        'presupuesto.concepto' => 'required|string|min:4|unique:presupuestos,concepto',
        'presupuesto.contacto' => 'nullable',
        'presupuesto.observaciones' => 'nullable',
        'presupuesto.coste' => 'numeric|nullable',
        'presupuesto.pagado' => 'nullable',
        'presupuesto.adelantado' => 'numeric|nullable',
    ];

    /**
     * Array with the error messages to be displayed
     *
     * @var array
     */
    protected $messages = [
        'presupuesto.concepto.required' => 'Debes poner un concepto',
        'presupuesto.concepto.unique' => 'Este concepto ya está en la DB, elije otro nombre',
    ];


    public function mount()
    {
        // $this->presupuesto = new Presupuesto();
    }
    /**
     * Render the view with the variables needed
     *
     * @return void
     */
    public function render()
    {
        $this->presupuestos = Presupuesto::all();

        $presupuestoMaxActual = new GetPresupuestoService();

        if( $presupuestoMaxActual->getMax() != null ){
            $presupuestoMaximo = $presupuestoMaxActual->getMax();
        }else{
            $presupuestoMaximo = 0;
        }

        // logic moved to GetPresupuestoService
        // foreach( $this->presupuestos as $presupuesto){
        //     $this->presupuesto_actual += $presupuesto->coste;
        // }

        // $this->saldo = $this->presupuesto_maximo - $this->presupuesto_actual;

        return view('livewire.admin.presupuesto-table', [
            'presupuestos' => $this->presupuestos,
            'presupuestoMaximo' => $presupuestoMaximo,
            // 'presupuesto_actual' => $this->presupuesto_actual,
            // 'saldo' => $this->saldo
        ]);
    }

    /**
     * Add a new ax Presupuesto to the DB
     *
     * @return void
     */
    public function presupuestoMaxModified( )
    {
        $newPresupuestoMax = new PresupuestoMaximo();

        $newPresupuestoMax->total = $this->presupuestoMaxNuevo;
        $newPresupuestoMax->save();

        session()->flash('message', 'HAS MODIFICADO CORRECTAMENTE EL PRESUPUESTO MÁXIMO.......O NO ;-))');

        return redirect()->to('presupuesto');

    }

    /**
     * Resets the page
     *
     * @return void
     */
    public function updatingActive()
    {
        $this->resetPage();
    }

    /**
     * Resets the page
     *
     * @return void
     */
    public function updatingQ()
    {
        $this->resetPage();
    }

    /**
     * SortBy function
     *
     * @param [type] $field
     * @return void
     */
    public function sortBy( $field)
    {
        if( $field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    /**
     * Gets the id of the presupuesto and sends it to the view to confirm deletion
     *
     * @param int $id
     * @return void
     */
    public function confirmPresupuestoDeletion( int $id)
    {
        $this->confirmingPresupuestoDeletion = true;
        $this->presupuesto = Presupuesto::findOrFail($id);

    }


    /**
     * Delete the presupuesto and sends a message to the user
     *
     * @return void
     */
    public function deletePresupuesto( )
    {
        $this->presupuesto->delete();
        $this->confirmingPresupuestoDeletion = false;
        session()->flash('message', 'Linea de Presupuesto borrada correctamente');
        $this->presupuesto_actual = 0;
        // $this->emitSelf('confirmed');
        return redirect()->to('presupuesto');
    }

    /**
     * Shows the modal for adding a new presupuesto
     *
     * @return void
     */
    public function confirmPresupuestoAdd()
    {
        $this->reset(['presupuesto']);
        $this->confirmingPresupuestoAdd = true;
    }

    /**
     * Confirm the modal to edit a presupuesto
     */

    public function confirmPresupuestoEdit( Presupuesto $presupuesto )
    {
        $this->resetErrorBag();
        $this->presupuesto = $presupuesto;
        $this->confirmingPresupuestoAdd = true;
    }

    /**
     * Gets via the GetPresupuestoService the max presupuesto from the DB
     *
     * @param GetPresupuestoService $getPresupuesto
     * @return void
     */
    public function confirmPresupuestoMax( GetPresupuestoService $getPresupuesto)
    {
        $this->reset(['presupuesto']);
        $this->confirmingPresupuestoMax = true;

        $this->presupuestoMaxActual =  $getPresupuesto->getMax();
    }

    /**
     * save the presupuesto linea
     *
     * @return void
     */
    public function savePresupuesto()
    {

        if( isset( $this->presupuesto->id)) {

            $this->rules['presupuesto.concepto'] = 'required|string|min:4';

            $this->validate();

            $this->presupuesto->save();
            session()->flash('message', 'Línea de Presupuesto modificada correctamente');

            $this->rules['presupuesto.concepto'] = 'required|string|min:4|unique:presupuestos,concepto';

            // $this->emitSelf('saved');
            // $this->presupuesto = new Presupuesto();

            // return redirect()->to('presupuesto');

        } else {

            $this->validate();

            $presupuesto = new Presupuesto();
            $presupuesto->concepto = $this->presupuesto['concepto'];
            $presupuesto->contacto = $this->presupuesto['contacto'];
            $presupuesto->pagado = isset($this->presupuesto['pagado']) ? 1 : 0;
            $presupuesto->observaciones = $this->presupuesto['observaciones'];
            $presupuesto->coste = $this->presupuesto['coste'];
            $presupuesto->adelantado = $this->presupuesto['adelantado'];

            if($presupuesto->save()){
                session()->flash('message', 'Linea de Presupuesto añadida correctamente');
            }else{
                session()->flash('message', 'No se pudo añadir la linea de presupuesto');
            }

        }

        $this->confirmingPresupuestoAdd = false;
        $this->presupuesto_actual = 0;

        $this->presupuesto = new Presupuesto();

        // $this->emitSelf('saved');
        // return redirect()->to('presupuesto');
        return redirect(request()->header('Referer'));

    }


}
