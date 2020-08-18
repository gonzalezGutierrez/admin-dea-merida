<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Report extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {

        $this->details = $details;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $attachmentFile = public_path() . '/' . 'report.pdf';
        return $this->subject('Mail from test.com')
                    ->view('email.email')->attach($attachmentFile, [
                        'as' => 'report.pdf',
                        'mime' => 'application/pdf',
                   ]);
    }
}