<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
// use Livewire\WithPagination;

class UsersTable extends Component
{
    // use WithPagination;

    protected $users;

    public $user;

    public $confirmed = 0;

    public $perPage = 5;

    public $confirmingUsuarioDeletion = false;
    public $confirmingUsuarioAdd = false;

    protected $rules = [
        'user.name' => 'required|string|min:4',
        'user.email' => 'required|email',
        'user.confirmed' => 'nullable'
    ];

    public function render()
    {
        $this->users = User::paginate($this->perPage);
        $this->confirmed = User::where('confirmed', true)->count();
;
        // $this->users = $this->users->paginate(10);

        return view('livewire.admin.users-table', [
            'users' => $this->users,
            'confirmed' => $this->confirmed
        ]);
    }

    public function loadMore()
    {
        $this->perPage += 5;
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

    public function confirmUsuarioDeletion( $id)
    {
        $this->confirmingUsuarioDeletion = $id;
    }

    public function deleteUsuario( User $user)
    {
        $user->delete();
        $this->confirmingUsuarioDeletion = false;
        session()->flash('message', 'Invitado borrado correctamente');

        return redirect()->to('usuarios');
    }

    public function confirmUsuarioAdd()
    {
        $this->reset(['user']);
        $this->confirmingUsuarioAdd = true;
    }

    public function confirmUsuarioEdit(User $user)
    {
        $this->resetErrorBag();
        $this->user = $user;
        $this->confirmingUsuarioAdd = true;
    }

    public function saveUsuario()
    {
        $this->validate();

        if( isset( $this->user->id)) {
            $this->user->save();
            session()->flash('message', 'Invitado Saved Successfully');
        } else {
            $user = new User();
            $user->name = $this->user['name'];
            $user->email = $this->user['email'];
            $user->confirmed = $this->user['confirmed'];
            $user->password = '$2y$10$gAGfwn68oQUxhKElINuBr.ADGXaRI4na2ObDtQRXcbTCAOlPpguAW'; //password
            // $this->user = $validated;
            // dd($user);
            if($user->save()){
                session()->flash('message', 'Invitado añadido correctamente');
            }else{
                session()->flash('message', 'No se pudo añadir el invitado');
            }

        }

        $this->confirmingUsuarioAdd = false;

        return redirect()->to('usuarios');

    }
}
