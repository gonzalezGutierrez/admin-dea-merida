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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attachmentFile = public_path() . '/' . 'report.pdf';
        return $this->subject('Aviso de activación')
            ->view('email.email')
            ->attach($attachmentFile, [
                'as' => 'report.pdf',
                'mime' => 'application/pdf',
        ]);
    }
}
