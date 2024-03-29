<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Novio;
use App\Models\Adress;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmedAttendance extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Set the user
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $novio = Novio::where('novio', TRUE)->firstOrFail();
        $novia = Novio::where('novia', TRUE)->firstOrFail();
        $adress = Adress::first();


        return $this->view('emails.confirmedAttendance')
            ->with([
                'user' => $this->user,
                'novio' => $novio,
                'novia' => $novia,
                'adress' => $adress
            ])
            ->attach('storage/invitation/invitation.png');
    }
}
