<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Collection;

class PresupuestoTable extends Component
{
    public Collection $presupuestos;

    public $presupuesto;

    public int $presupuesto_maximo = 6000;
    public int $presupuesto_actual = 0;
    public int $saldo = 0;

    public bool $confirmingPresupuestoDeletion = false;
    public bool $confirmingPresupuestoAdd = false;

    protected $rules = [
        'presupuesto.concepto' => 'required|string|min:4',
        'presupuesto.contacto' => 'nullable',
        'presupuesto.observaciones' => 'nullable',
        'presupuesto.coste' => 'numeric|nullable',
        'presupuesto.pagado' => 'nullable'
    ];

    public function mount(){

        $this->presupuestos = Presupuesto::all();

        foreach( $this->presupuestos as $presupuesto){
            $this->presupuesto_actual += $presupuesto->coste;
        }

        $this->saldo = $this->presupuesto_maximo - $this->presupuesto_actual;

    }

    public function render()
    {
        // dd($this->presupuesto_actual);
        return view('livewire.admin.presupuesto-table', [
            'presupuestos' => $this->presupuestos,
            'presupuesto_máximo' => $this->presupuesto_maximo,
            'presupuesto_actual' => $this->presupuesto_actual,
            'saldo' => $this->saldo
        ]);
    }

    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function sortBy( $field)
    {
        if( $field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function confirmPresupuestoDeletion( $id)
    {
        $this->confirmingPresupuestoDeletion = true;
        $this->presupuesto = Presupuesto::findOrFail($id);

    }

    public function deletePresupuesto( )
    {
        $this->presupuesto->delete();
        $this->confirmingPresupuestoDeletion = false;
        session()->flash('message', 'Linea de Presupuesto borrada correctamente');
        $this->presupuesto_actual = 0;
        $this->mount();
        $this->render();
    }

    public function confirmPresupuestoAdd()
    {
        $this->reset(['presupuesto']);
        $this->confirmingPresupuestoAdd = true;
    }

    public function confirmPresupuestoEdit( Presupuesto $presupuesto )
    {
        $this->resetErrorBag();
        $this->presupuesto = $presupuesto;
        $this->confirmingPresupuestoAdd = true;
    }

    public function savePresupuesto()
    {
        // dd($this->presupuesto);
        $this->validate();

        if( isset( $this->presupuesto->id)) {
            $this->presupuesto->save();
            session()->flash('message', 'Línea de Presupuesto modificada correctamente');
        } else {
            $presupuesto = new Presupuesto();
            $presupuesto->concepto = $this->presupuesto['concepto'];
            $presupuesto->contacto = $this->presupuesto['contacto'];
            $presupuesto->pagado ? $this->presupuesto['pagado'] : false;
            $presupuesto->observaciones = $this->presupuesto['observaciones'];
            $presupuesto->coste = $this->presupuesto['coste'];
            // dd($presupuesto);
            if($presupuesto->save()){
                session()->flash('message', 'Linea de Presupuesto añadida correctamente');
            }else{
                session()->flash('message', 'No se pudo añadir la linea de presupuesto');
            }

        }

        $this->confirmingPresupuestoAdd = false;
        $this->presupuesto_actual = 0;
        $this->mount();

    }


}
