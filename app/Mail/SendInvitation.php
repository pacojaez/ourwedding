<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Novio;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvitation extends Mailable
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

        return $this->view('emails.invitation')
                ->with([
                    'user' => $this->user,
                    'novio' => $novio,
                    'novia' => $novia
                ])
                ->attach('storage/invitation/invitation.png');
    }
}
