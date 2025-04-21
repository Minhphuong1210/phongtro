<?php
namespace App\Http\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailPhongTro extends Mailable{
    use Queueable, SerializesModels;

public $data;
public $user;
    public function __construct($data,$user){
        $this->data = $data;
       $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Thông báo có người đăng phòng')
            ->view('Frontend.User.Mail')
            ->with([
                'data' => $this->data,
                'user'=>$this->user
                
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