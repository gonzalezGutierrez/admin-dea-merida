<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "recibido";
    public $visita;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($visita)
    {
        $this->visita = $visita;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.visit');
    }
}
