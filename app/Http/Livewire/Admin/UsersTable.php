<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Mail\SendInvitation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
// use Livewire\WithPagination;

class UsersTable extends Component
{
    // use WithPagination;

    /**
     * Get the users to paginate them
     * @var LengthAwarePaginator
     */
    protected LengthAwarePaginator $users;


    /**
     * get the instance of one user to do something with it
     * @var
     */
    public $user;


    /**
     * Confirmn (1) or not (0) the attendance to the wedding variable, default 0
     * @var int
     */
    public int $confirmed = 0;

    /**
     * variable to get the users per page
     * @var integer
     */
    public $perPage = 5;


    /*
     * variable to confirmn the User deletion
     * @var boolean
     */
    public $confirmingUsuarioDeletion = false;

    /**
     * Variable to show the modal for adding a new user
     *
     * @var boolean
     */
    public $confirmingUsuarioAdd = false;

    /**
     * Rule to validate the user from the form
     *
     * @var array
     */
    protected $rules = [
        'user.name' => 'required|string|min:4',
        'user.email' => 'required|email',
        'user.confirmed' => 'nullable'
    ];

    /**
     * renders the view
     *
     * @return void
     */
    public function render()
    {
        $this->users = User::paginate($this->perPage);
        $this->confirmed = User::where('confirmed', true)->count();

        // $this->users = $this->users->paginate(10);

        return view('livewire.admin.users-table', [
            'users' => $this->users,
            'confirmed' => $this->confirmed
        ]);
    }

    /**
     * load 5 users more
     *
     * @return void
     */
    public function loadMore()
    {
        $this->perPage += 5;
    }

    /**
     * resets the page
     *
     * @return void
     */
    public function updatingActive()
    {
        $this->resetPage();
    }

    /**
     * resets the page
     *
     * @return void
     */
    public function updatingQ()
    {
        $this->resetPage();
    }

    /**
     * Sort by the specified field
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
     * shows the modal with the users id to be deleted
     *
     * @param [type] $id
     * @return void
     */
    public function confirmUsuarioDeletion( $id)
    {
        $this->confirmingUsuarioDeletion = $id;
    }

    /**
     * deletes the users from the DB
     *
     * @param User $user
     * @return void
     */
    public function deleteUsuario( User $user)
    {
        $user->delete();
        $this->confirmingUsuarioDeletion = false;
        session()->flash('message', 'Invitado borrado correctamente');

        return redirect()->to('usuarios');
    }

    /**
     * shows the modal with the form for adding a new user
     *
     * @return void
     */
    public function confirmUsuarioAdd()
    {
        $this->reset(['user']);
        $this->confirmingUsuarioAdd = true;
    }

    /**
     * shows the modal with the user to be updated
     *
     * @param User $user
     * @return void
     */
    public function confirmUsuarioEdit(User $user)
    {
        $this->resetErrorBag();
        $this->user = $user;
        $this->confirmingUsuarioAdd = true;
    }

    /**
     * saves a new user or updates a user if the user id property is set
     *
     * @return void
     */
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
            $user->confirmed = 0;
            $user->password = Hash::make('12345678');
            // $user->password = '$2y$10$gAGfwn68oQUxhKElINuBr.ADGXaRI4na2ObDtQRXcbTCAOlPpguAW'; //password
            // $this->user = $validated;

            if($user->save()){
                session()->flash('message', 'Invitado añadido correctamente');
            }else{
                session()->flash('message', 'No se pudo añadir el invitado');
            }

        }

        $this->confirmingUsuarioAdd = false;

        return redirect()->to('usuarios');

    }

    /**
     * Sents a new invitation to a user
     * using the invitation template
     *
     * @param integer $id
     * @return void
     */
    public function sendInvitation( int $id )
    {
        $user = User::findOrFail($id);
        $user->invitated = true;
        $user->save();

        Mail::to($user->email)->cc('pacojaez@gmail.com', 'omatheu@hotmail.com' )->send(new SendInvitation( $user));

    }
}
