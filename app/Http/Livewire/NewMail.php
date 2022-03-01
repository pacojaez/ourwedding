<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class NewMail extends Component
{

    /**
     * a variable to instanciate the subject
     *
     * @var string
     */
    public string $subject = '';

    /**
     * a variable to instanciate the content
     *
     * @var string
     */
    public string $contenido = '';

    /**
     * Variable to show the modal for adding a new user
     *
     * @var boolean
     */
    public $confirmNewMail = false;


    /**
     * Rule to validate the user from the form
     *
     * @var array
     */
    protected $rules = [
        'subject' => 'required|string|min:4',
        'contenido' => 'required|string',
    ];

    /**
     * Array with the error messages to be displayed
     *
     * @var array
     */
    protected $messages = [
        'subject.required' => 'Debes poner un asunto',
        'contenido.required' => 'El cuerpo del mail debe tener contenido',
    ];


    /**
     * shows the modal with the subject and content to be sent
     *
     * @param [type] $id
     * @return void
     */
    public function confirmingNewMail( )
    {
        $this->confirmNewMail = true;
    }


    public function render()
    {
        return view('livewire.new-mail');
    }

    /**
     * Sents a new invitation to a user
     * using the invitation template
     *
     * @param integer $id
     * @return void
     */
    public function sendnewMail ( )
    {
        $this->validate();

        // $this->subject = $subject;
        // $this->content = $contenido;

        $users = User::all();

        foreach( $users as $user ){
            Mail::to( $user->email )->send(new SendNewMail ( $this->subject, $this->contenido, $user));
        }

        $this->confirmNewMail = false;
    }
}
