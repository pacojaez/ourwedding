<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Novio;
use Livewire\Component;
use App\Mail\ConfirmedAttendance;
use Illuminate\Support\Facades\Mail;


class ConfirmAttendance extends Component
{
    /**
     * listener to refresh the page
     *
     * @var array
     */
    protected $listeners = ['confirmed' => '$refresh'];

    /**
     * variable for confirming the attendance, default false
     *
     * @var boolean
     */
    public bool $confirmingAttendance = false;

    /**
     * Changes to true the attendance after User´s confirmation
     * Send a mail to the user email CC admins
     *
     * @return void
     */
    public function save(){

        $this->confirmingAttendance = true;
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $user->confirmed = 1;
        $user->save();

        $novio = Novio::where('novio', 'like', TRUE)->firstOrFail();
        $novia = Novio::where('novia', 'like', TRUE)->firstOrFail();

        Mail::to($user->email)->cc($novio->email, $novia->email )->send(new ConfirmedAttendance($user));
        $this->confirmingAttendance = false;

        $this->emit('confirmed');

    }

    /**
     * render the view with the variables
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.confirm-attendance', [
            'confirminingAttendance' => $this->confirmingAttendance = false,
        ]);
    }
}
