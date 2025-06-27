<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

 public $otp, $expiry;

public function __construct($otp, $expiry)
{
    $this->otp = $otp;
    $this->expiry = $expiry;
}

public function content(): Content
{
    return new Content(
        view: 'emails.otp',
        with: [
            'otp' => $this->otp,
            'expiry' => $this->expiry,
        ]
    );
}

    public function attachments(): array
    {
        return [];
    }
}
