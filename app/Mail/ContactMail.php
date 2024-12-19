<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $messageContent)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->subject('Message From ' . $this->name)
                    ->view('emails.contact');
    }
}
