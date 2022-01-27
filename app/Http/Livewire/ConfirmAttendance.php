<?php

namespace App\Http\Livewire;

use App\Mail\ConfirmedAttendance;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class ConfirmAttendance extends Component
{
    protected $listeners = ['confirmed' => '$refresh'];

    public $confirmingAttendance = false;

    public function save(){

        // $this->emit('confirmed');

        $this->confirmingAttendance = true;
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $user->confirmed = 1;
        $user->save();

        Mail::to($user->email)->cc('pacojaez@gmail.com', 'omatheu@hotmail.com' )->send(new ConfirmedAttendance($user));
        $this->confirmingAttendance = false;

        $this->emit('confirmed');

    }

    public function render()
    {
        return view('livewire.confirm-attendance', [
            'confirminingAttendance' => $this->confirmingAttendance = false,
        ]);
    }
}
