<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email_address;
    protected $generated_password;
    public function __construct($email_address, $generated_password)
    {
        $this->email_address = $email_address;
        $this->generated_password = $generated_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_address = $this->email_address;
        $generated_password = $this->generated_password;
        return $this->markdown('mail.accountconfirmation', compact('email_address', 'generated_password'));
    }
}
