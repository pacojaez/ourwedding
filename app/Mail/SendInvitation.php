<?php

namespace App\Mail;

use App\Models\User;
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
        return $this->view('emails.invitation')
                ->with([
                    'user' => $this->user,
                ])
                ->attach('img/olgapaco.png');
    }
}
