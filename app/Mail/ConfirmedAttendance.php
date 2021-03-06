<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

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
        return $this->view('emails.confirmedAttendance')
            ->with([
                'user' => $this->user,
            ])
            ->attach('img/olgapaco.png');
    }
}
