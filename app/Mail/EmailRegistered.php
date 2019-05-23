<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRegistered extends Mailable
{
    use Queueable, SerializesModels;

    private $username;

    private $active_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $active_token)
    {
        //
        $this->username = $username;
        
        $this->active_token = $active_token;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.verify')
                    ->with([
                        'username'     => $this->username,
                        'active_token' => $this->active_token,
                    ]);
    }
}
