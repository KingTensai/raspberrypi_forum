<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Mail\Mailable;

class ContactReplyMail extends Mailable
{
    public $messageData;

    public function __construct(ContactMessage $messageData)
    {
        $this->messageData = $messageData;
    }

    public function build()
    {
        return $this->subject('Reply to your message')
            ->view('emails.contact_reply');
    }
}
