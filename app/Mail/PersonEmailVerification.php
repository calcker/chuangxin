<?php

namespace App\Mail;

use App\Models\Auth\User;
use App\Models\Auth\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PersonEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Email $email)
    {
        //
        $this->user = $user;
        
        $this->email = $email;

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
                        'username'     => $this->user->username,
                        'active_token' => $this->email->active_token,
                    ]);
    }
}
