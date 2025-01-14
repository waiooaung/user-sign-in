<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestSignedIn extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $dateTime)
    {
        $this->data = $data;
        $this->dateTime = $dateTime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        return $this->subject('Signed In')
            ->view('emails.user_signed_in')
            ->with([
                'data' => $this->data,
                'dateTime' => $this->dateTime
            ]);
    }
}
