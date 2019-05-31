<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PersonEmailVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $name;

    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $token)
    {
        //
        $this->name = $name;

        $this->token = $token;
    
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
                        'name' => $this->name,
                        'url'  => config('app.url'). '/register/verify/' . $this->token,
                    ]);
    }
}
