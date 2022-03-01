<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Set the subject
     *
     * @var string
     */
    public $subject;

    /**
     * Set the contenido
     *
     * @var string
     */
    public $contenido;

    /**
     * Set the contenido
     *
     * @var User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( string $subject, string $contenido, User $user )
    {
        $this->subject = $subject;
        $this->contenido = $contenido;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newMail')
            ->subject( $this->subject)
            ->with([
                'contenido' => $this->contenido,
                'user' => $this->user
            ])
            ->attach('img/olgapaco.png');
    }
}
