<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Habitacion;

class HabitacionsTable extends Component
{
    /**
     * Get the habitacions from the DB
     * @var Collection
     */
    protected Collection $habitacions;

    /**
     * get the instance of one user to do something with it
     * @var
     */
    public Habitacion $habitacion;

    /**
     * Rule to validate the user from the form
     *
     * @var array
     */
    protected $rules = [
        'habitacion.ocupante1' => 'string|nullable',
        'habitacion.ocupante2' => 'string|nullable',
        'habitacion.ocupante3' => 'string|nullable',
        'habitacion.ocupante4' => 'string|nullable',
        'habitacion.observaciones' => 'string|nullable',
    ];

    /**
     * Render the view
     *
     * @return void
     */
    public function render()
    {
        $this->habitacions = Habitacion::all();

        return view('livewire.admin.habitacions-table', [
                'habitacions' => $this->habitacions,

        ]);
    }

    /**
     * Variable to show the modal for EDIT AN HABITACION
     *
     * @var boolean
     */
    public $confirmingHabitacionEdit = false;

    /**
     * shows the modal with the user to be updated
     *
     * @param User $user
     * @return void
     */
    public function confirmHabitacionEdit( Habitacion $habitacion )
    {
        $this->resetErrorBag();
        $this->habitacion = $habitacion;
        $this->confirmingHabitacionEdit = true;
    }

    /**
     * save changes in the habitacion distribution
     *
     * @return void
     */
    public function saveHabitacion()
    {
        $this->validate();

        if( isset( $this->habitacion->id)) {
            $this->habitacion->save();
            session()->flash('message', 'Cambios guardados correctamente');
        }

        return redirect()->to('habitacions');

    }
}
