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

    private $data;
    private $dateTime;

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
        $email = $this->subject('Signed In')
            ->view('emails.user_signed_in')
            ->with([
                'data' => $this->data,
                'dateTime' => $this->dateTime
            ]);

        if (!empty($this->data->photo)) {
            $photoPath = storage_path('app/public/' . $this->data->photo);
            $email->attach($photoPath, [
                'as' => 'photo.png',
                'mime' => 'image/png',
            ]);
        }

        return $email;
    }
}
