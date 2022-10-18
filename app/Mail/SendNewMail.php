<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Novio;
use App\Models\Adress;
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
        $novio = Novio::where('novio', TRUE)->firstOrFail();
        $novia = Novio::where('novia', TRUE)->firstOrFail();
        $adress = Adress::first();

        set_time_limit(0);

        return $this->view('emails.newMail')
            ->subject( $this->subject)
            ->with([
                'contenido' => $this->contenido,
                'user' => $this->user,
                'novio' => $novio,
                'novia' => $novia,
                'adress' => $adress
            ])
            ->attach('storage/invitation/invitation.png');
    }
}
