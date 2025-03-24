<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotpasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $token;
    public function __construct($user,$tokenData)
    {
        //
        $this->user = $user;
        $this->token = $tokenData;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Quên mật khẩu')
            ->view('Frontend.Auth.mail-forgot-password')
            ->with([
                'user' => $this->user,
                'token' => $this->token
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments()
    {
        return [];
    }
}